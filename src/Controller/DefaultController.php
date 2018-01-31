<?php

namespace App\Controller;


use App\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/form-post/", name="form-post")
     */

    public function formPost(){
        return $this->render('form-post.html.twig');
    }
    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/new-post/", name="name-post")
     */

    public function newPost(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = new Posts();
        $post->setTitle($request->get('title');
        $post->setText($request->get('text');

        /** @var UploadedFile $image */

        $image = $request->files->get('image_path');
        file_put_contents(__DIR__. '/../../public/' .
            $image->getClientOriginalName());
            file_get_contents($image['realPath']);
        $post->setImagePath($image['originalName']);
        $em->persist($post);
        $em->flush();

        return new Response('Saved new post with id '.$post->getId());
    }

    /**
     * @Route("/", name="index")
     */
    public function index(string $name = 'Гость')
    {
        return $this->render('index.html.twig', [
            'name' => $name,
            'list' => [
                'Коля',
                'Владимир',
                'Сергей'
            ]
        ]);

    }

    /**
     * @param $id
     * @return Response
     * @Route ("/post/{id}", name="get_post")
     */

    public function getPost($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository(Posts::class);

        $post = $repository->find($id);

        return $this->render('post.html.twig', [
            'post' => $post,
        ]);

//        return $this->render('post.html.twig', [
//            'id' => $id,
//        ]);
    }
}