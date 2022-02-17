<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\CommentType;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PostController extends AbstractController
{
    #[Route('/', name: 'post_index', methods: ['GET'])]
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $postRepository->findBy(['status'=>'published'],['id'=>'DESC']),
        ]);
    }



    #[Route('/post/{id}', name: 'post_show', methods: ['GET','post'])]
    public function show(Post $post,Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentForm = $this->createForm(CommentType::class);
        $commentForm->handleRequest($request);

        // $commentForm->isValid() 用于检验token,防止csrf攻击
        if($commentForm->isSubmitted() && $commentForm->isValid())
        {
            /**@var Comment $data**/
            $data = $commentForm->getData();
            $data->setPost($post);
            $entityManager->persist($data);
            $entityManager->flush();
        }


        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comment_form' =>$commentForm->createView()
        ]);
    }



}
