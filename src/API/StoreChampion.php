<?php

declare(strict_types=1);

namespace App\Api;

use App\Contracts\StoreChampion as StoreChampionInterface;
use App\Dto\Champion as DtoChampion;
use App\Dto\Role as DtoRole;
use App\Dto\Score as DtoScore;
use App\Exceptions\ApiException;
use App\Models\Champion as ChampionModel;
use App\Models\Role as RoleModel;
use Database\Connection;

final class StoreChampion extends Connection implements StoreChampionInterface
{
    public const ENDPOINT = 'http://ddragon.leagueoflegends.com/cdn/12.23.1/data/en_US/champion.json';

    public function index(): array
    {
        $httpCall = new HttpCall(self::ENDPOINT);

        try {
            $data = Client::call($httpCall);
        } catch (ApiException $e) {
            throw new ApiException($e->getMessage());
        }

        return $data;
    }

    public function store(): void
    {
        $data = $this->index();

        foreach ($data['data'] as $champion) {
            $this->connection->beginTransaction();
            $championId = $this->createChampion($champion);
            if ($championId) {
                $tags = $this->createTags($champion);
                $this->linkChampionWithTags($championId, $tags);
            }
            try {
                $this->connection->commit();
            } catch(\Exception $e) {
                $this->connection->rollback();
            }
        }
    }

    private function createChampion(array $champion): int
    {
        $dtoChampion = new DtoChampion();
        $dtoChampion->setName($champion['name']);
        $dtoChampion->setIdName($champion['id']);
        $championModel = new ChampionModel();
        return $championModel->store($dtoChampion);
    }

    private function createTags($champion): array
    {
        $tags = [];
        foreach ($champion['tags'] as $tag) {
            $tags[] = $this->createTag($tag);
        }

        return $tags;
    }


    private function createTag(string $tag): int
    {
        $dtoRole = new DtoRole();
        $dtoRole->setName($tag);
        $roleModel = new RoleModel();
        $roleId = $roleModel->store($dtoRole);
        if ($roleId) {
            return $roleId;
        }
        return $roleModel->get($tag)['id'];
    }

    private function linkChampionWithTags(int $championId, array $tags): void
    {
        foreach ($tags as $tag) {
            $this->linkChampionWithTag($championId, $tag);
        }
    }

    private function linkChampionWithTag(int $championId, int $tagId): void
    {
        $championModel = new ChampionModel();
        $championModel->associateTag($championId, $tagId);
    }
}
