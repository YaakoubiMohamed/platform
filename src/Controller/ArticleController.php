<?php
 
namespace App\Controller;
 
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpFoundation\Request;
 
#[AsController]
class ArticleController extends AbstractController
{
    private $managerRegistry;
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }
    
    public function __invoke(CategorieRepository $catrepo, SousCategorieRepository $sourep, 
    ArticleRepository $articleRepository,Request $request)
    {
        
        $id = $request->query->get('id');
        dd($id);
        /*
        $category = $sourep->find($id);
        //dd($category);
        static $categories = array();
        $categories[] = $sourep->findBy(
            ['categorie' => $category],
        );        
        //dd($categories);
        static $products = array();
        foreach($categories as $cat) 
        {
            //dd($cat);
            $products[] = $articleRepository->findBy(
                ['souscat' => $cat],
            );
        }
        */
        //dd($products);
        //return $products;
        //$products = $articleRepository->findByCategorie($categories);
        //dd($products);
    }       

    /*
    private function getAllParents(Categorie $category) 
    {
        static $categories = array();

        if($category->getParent()) 
        {
            $categories[] = $category->getParent()->getId();
            $this->getAllParents($category->getParent());
        }

        return $categories;
    }
    */
}