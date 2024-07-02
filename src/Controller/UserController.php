<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Formatter\ApiResponseFormatter;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractController
{
    public function __construct (
        private UserService $userService,
        private ApiResponseFormatter $apiResponseFormatter)
    {

    }
    #[Route('/api/users/me', name: 'me', methods: ["GET"])]
    #[IsGranted("ROLE_USER")]
    public function me(): JsonResponse
    {
        $user = $this->getUser();
        return $this->apiResponseFormatter->success($this->userService->getUserData($user));
    }
    #[Route('/api/users/one/{id}', name: 'one', methods: ["GET"])]
    #[IsGranted("ROLE_SHOW_USER")]
    public function one(int $id): JsonResponse
    {
        $user = $this->userService->one($id);
        if ($user) {
            $data = $this->userService->getUserData($user);
            return $this->apiResponseFormatter->success($data);
        } else {
            return $this->apiResponseFormatter->error("User not found");
        }
    }
    #[Route('/api/users/all', name: 'all', methods: ["GET"])]
    #[IsGranted("ROLE_SHOW_USERS")]
    public function all(): JsonResponse
    {
        $users = $this->userService->all();
        $data = array_map([$this->userService, 'getUserData'], $users);

        return $this->apiResponseFormatter->success($data);
    }
}
