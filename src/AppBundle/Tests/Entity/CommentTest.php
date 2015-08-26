<?php

use AppBundle\Entity\Comment;
use AppBundle\Entity\Rating;

class CommentTest extends \PHPUnit_Framework_TestCase
{
    private $goodRating;
    private $badRating;

    protected function setUp()
    {
        $this->goodRating = new Rating();
        $this->goodRating->setGood(true);

        $this->badRating = new Rating();
        $this->badRating->setGood(false);
    }

    public function testGetTotalScoreWhenThereAreNoRatings()
    {
        $comment = new Comment();
        $actual  = $comment->getTotalScore();

        $this->assertEquals(0, $actual);
    }

    public function testGetTotalScore()
    {
        $comment = new Comment();
        $comment->addRating($this->goodRating);
        $comment->addRating(clone $this->goodRating);
        $actual = $comment->getTotalScore();

        $this->assertEquals(2, $actual);
    }

    public function testGetTotalScore2()
    {
        $comment = new Comment();
        $comment->addRating($this->goodRating);
        $comment->addRating(clone $this->goodRating);
        $comment->addRating($this->badRating);
        $actual = $comment->getTotalScore();

        $this->assertEquals(1, $actual);
    }

    public function testGetTotalScoreReturnNegativeScore()
    {
        $comment = new Comment();
        $comment->addRating($this->badRating);
        $actual = $comment->getTotalScore();

        $this->assertEquals(-1, $actual);
    }
}
