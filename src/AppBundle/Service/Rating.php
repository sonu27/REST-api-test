<?php
namespace AppBundle\Service;

use AppBundle\Entity\CommentRepository;
use AppBundle\Entity\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class Rating
{
    private $userRepo;
    private $commentRepo;

    public function __construct(UserRepository $userRepo, CommentRepository $commentRepo)
    {
        $this->userRepo    = $userRepo;
        $this->commentRepo = $commentRepo;
    }

    public function addRating(Request $request, \AppBundle\Entity\Comment $comment)
    {
        if ($this->validateRequest($request)) {
            $userId   = $request->request->get('user');
            $thumbsUp = $request->request->get('rating');
            $user     = $this->userRepo->findOneById($userId);

            $comment->addRating($this->createRating($user, $thumbsUp));
            $this->commentRepo->save($comment);

            return true;
        }

        return false;
    }

    private function validateRequest(Request $request)
    {
        if ($request->request->has('user') && $request->request->has('rating')) {
            return true;
        }

        return false;
    }

    private function createRating($user, $thumbsUp)
    {
        $rating = new \AppBundle\Entity\Rating();
        $rating->setUser($user);
        $rating->setGood($thumbsUp);

        return $rating;
    }
}
