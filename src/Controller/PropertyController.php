<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/ventes", name="property.index")
     * @return Response
     */
    public function index (): Response
    {
        /* Exemple de requete on doctrine
        $property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(200000)
            ->setRooms(4)
            ->setBedrooms(3)
            ->setDescription('Une petite description')
            ->setSurface(60)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Montpellier')
            ->setAddress('15 Boulevard Gambetta')
            ->setPostalCode('34000');
        $em = $this->getDoctrine()->getManager();
        //persister cette propriété
        $em->persist($property);
        //porter tout les changement de l'entity manager dans la BDD
        //Envoyer en BDD
        $em->flush();*/

        //$repository = $this->getDoctrine()->getRepository(Property::class);
        //dump($repository);

        $property = $this->repository->findAllVisible();
        return $this->render('property/index.html.twig', [
            'current_only' => 'properties'
        ]);
    }

}