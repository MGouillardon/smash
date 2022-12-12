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
    const ENDPOINT = 'http://ddragon.leagueoflegends.com/cdn/12.23.1/data/en_US/champion.json';

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

    public function store()
    {
        $data = $this->index();

        foreach ($data['data'] as $champion) {
            $dtoChampion = new DtoChampion();
            $dtoChampion->setName($champion['name']);
            $championModel = new ChampionModel();
            $championModel->store($dtoChampion);

            foreach ($champion['tags'] as $tag) {
                $dtoRole = new DtoRole();
                $dtoRole->setName($tag);
                $roleModel = new RoleModel();
                $roleModel->store($dtoRole);
            }

            // récupérer le champion créé
            // et de le lier aux tags


            // et ensuite tout refacto =)
            
        }
    }
}
