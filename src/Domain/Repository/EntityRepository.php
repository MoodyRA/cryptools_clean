<?php

declare(strict_types=1);

namespace Cryptools\Domain\Repository;

interface EntityRepository
{
    /**
     * Récupère un objet à partir de sa clé primaire / son identifiant
     * @param mixed $id
     * @return null|object Une instance de l'entité
     */
    public function find(mixed $id): ?object;

    /**
     * Récupère tous les objets
     *
     * @return array Tableau d'instances.
     */
    public function findAll(): array;

    /**
     * Récupère des objets selon différents critères
     *
     * @param array $criteria Les différents critères de récupération (ex : filtrage, limit, ...)
     * @return array Tableau d'instances.
     */
    public function findBy(array $criteria): array;

    /**
     * Récupère un objet selon différents critères
     *
     * @param array $criteria
     * @return null|object Une instance de l'entité
     */
    public function findOneBy(array $criteria): ?object;
}