<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        /* Variável para armazenar o caminho do diretório raíz do projeto. */
        $rootDir = __DIR__ . '/../..';
        /* Determina o modo de operação do Doctrine. */
        $config = Setup::createAnnotationMetadataConfiguration(
        /* Determina em quais caminhos o Doctrine vai buscar por annotations. */
            [$rootDir . '/src'],
        /* Habilita o modo de desenvolvedor, mais verboso. */
            true
        );

        /* Determina configurações de conexão ao banco de dados */
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];

        /**
         * Retorna um gerenciador de entidades do Doctrine a partir dos parâmetros
         * de conexão e configuração fornecidos
         */
        return EntityManager::create($connection, $config);
    }
}