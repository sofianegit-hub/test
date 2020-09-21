<?php
/**
 * Created by PhpStorm.
 * User: sofiane
 * Date: 18/09/2020
 * Time: 16:11
 */

namespace App\Controller;


use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UtilisateurController extends AbstractController
{

    /*
     * Pour rentrer les données ci dessous dans la bdd
    public function index()
    {
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom('Ricciardo')
            ->setPrenom('Daniel')
            ->setBirthday('1 juillet 1989')
            ->setMail('honey.badger@fia.com')
            ->setPhone('0610101010');


        $utilisateur2 = new Utilisateur();
        $utilisateur2->setNom('Gasly')
            ->setPrenom('Pierre')
            ->setBirthday('7 février 1996')
            ->setMail('pierrot-monza2020@fia.com')
            ->setPhone('0610101010');


        $utilisateur3 = new Utilisateur();
        $utilisateur3->setNom('Vettel')
            ->setPrenom('Sebastian')
            ->setBirthday('3 juillet 1987')
            ->setMail('babyschumy@fia.com')
            ->setPhone('0610101010');


        $em = $this->getDoctrine()->getManager();
        $em->persist($utilisateur1,$utilisateur1, $utilisateur1 );
        $em->flush();
    }

    */

    /**
     * @var UtilisateurRepository
     */
    private $repository;

    /**
     * @var EntityManager
     */
    private $em;


    public function __construct(UtilisateurRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     *
     */
    public function infosUtilisateur()
    {

        $utilisateur1 = $this->repository->getInfosUtilisateur1();
        $utilisateur2 = $this->repository->getInfosUtilisateur2();
        $utilisateur3 = $this->repository->getInfosUtilisateur3();

        $this->em->flush($utilisateur1, $utilisateur2, $utilisateur3);

    }

    public function index()
    {
        return $this -> render ('page/home.html.twig');

    }
}