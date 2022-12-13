<?php

declare(strict_types=1);

namespace App\Api;

use App\Dto\Champion as DtoChampion;
use App\Dto\Role as DtoRole;
use App\Exceptions\ApiException;
use App\Models\Champion as ChampionModel;
use App\Models\Role as RoleModel;

final class Champion
{
    public const ENDPOINT = 'http://ddragon.leagueoflegends.com/cdn/12.23.1/data/en_US/champion.json';

    public function index()
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

        // Refacto cette partie
        // 3 requêtes SQL par boucle
        // + bcp trop de méthode dans cette classe
        // une classe = un rôle, une méthode = une action
        // un classe doit avoir une seule et unique raison d'être modifiée
        foreach ($data['data'] as $champion) {
            $championId = $this->createChampion($champion);
            $tags = $this->createTags($champion);
            $this->linkChampionWithTags($championId, $tags);
        }
    }

    private function createChampion(array $champion): int
    {
        $dtoChampion = new DtoChampion();
        $dtoChampion->setName($champion['name']);
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
        return $roleModel->store($dtoRole);
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
