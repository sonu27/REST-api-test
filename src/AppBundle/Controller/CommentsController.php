<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/comments")
 */
class CommentController extends Controller
{
    /**
     * @Route("/{id}/ratings", name="comment_rating_new")
     * @Method("POST")
     * @ParamConverter("comment", class="AppBundle:Comment")
     */
    public function rateAction(Request $request, \AppBundle\Entity\Comment $comment)
    {
        $ratingService = $this->get('rating');
        $success = $ratingService->addRating($request, $comment);

        if ($success === true) {
            return new JsonResponse(['success' => $success]);
        }

        return new JsonResponse(['success' => 'false']);
    }
}
