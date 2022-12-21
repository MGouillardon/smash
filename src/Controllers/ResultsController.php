<?php

declare(strict_types=1);

namespace App\Controllers;

use Database\Connection;
use App\Models\Champion as ChampionModel;
use App\Dto\Role as DtoRole;
use App\Dto\Champion as DtoChampion;

class ResultsController extends Connection
{
    public function sendTopChampions(): string
    {
        $championModel = new ChampionModel();
        $topChampions = $championModel->getTopChampions();
        $topChampion = $this->flatterArray($topChampions);

        return json_encode($topChampion);
    }

    public function sendTopRoles(): string
    {
        $role = $_GET['role'];
        $roleModel = new DtoRole();
        $dtoRole = $roleModel->setName($role);
        $championModel = new championModel();
        $topChampionsByRole = $championModel->getTopChampionsByRole($dtoRole);
        $topChampionByRole = $this->flatterArray($topChampionsByRole);

        return json_encode($topChampionByRole);
    }

    private function flatterArray(array $array): array
    {
        return array_merge(
            ...array_map(
                fn (array $array) => [$array['name'] => $array['score']],
                $array
            )
        );
    }
}
