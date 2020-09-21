<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }


    public function getInfosUtilisateur1(){


       return $this->getInfos()
            ->andWhere('c.idUti = 1')
            ->getQuery()->getResult();


    }

    public function getInfosUtilisateur2(){


        return $this->getInfos()
            ->andWhere('c.idUti = 2')
            ->getQuery()->getResult();


    }

    public function getInfosUtilisateur3(){


        return $this->getInfos()
            ->andWhere('c.idUti = 3')
            ->getQuery()->getResult();


    }



    private function getInfos(){

        return $this->createQueryBuilder('u')
            ->select('nom, prenom, birthday, mail, COUNT(c.idUti)')
            ->innerJoin('u.idUti', 'c')
            ->innerJoin('u.idUti');
    }

    /*
     * Voici la requête que j'ai passé en sql et qui m'a sorti les données demandées :
     * SELECT nom, prenom, birthday, mail, COUNT(c.idUti) FROM utilisateur u ,compte c WHERE c.idUti = u.idUti AND c.idUti = 1
     * Avec idUti = 1 pour l'utilisateur 1 et ainsi de suite sur mysql
     */

}

