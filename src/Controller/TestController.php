<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(): Response
    {
        return new Response(<<<EOF
<html>
<head>
<title>这是我们第一个symfony页面！</title>
</head>
<body>
<h1>Hello World!</h1>
</body>
</html>
EOF
);
    }
}
