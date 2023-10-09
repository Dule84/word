<?php

namespace App\Controller;

use App\Services\DictionaryService;
use ErrorException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/', name: 'app_game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @throws ErrorException
     */
    #[Route('/api/validate', name: 'validate')]
    public function validateWord(Request $request, DictionaryService $dictionaryService): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $word = $data['word'];

        $response = $dictionaryService->checkIfWordExists($word);

        if (empty($response)) {
            return new JsonResponse(['message' => 'This word does not exist in English language!'], 500);
        }

        return new JsonResponse(['message' => $response]);
    }
}
