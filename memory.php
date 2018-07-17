<?php
class Memory
{
    public $MAX_CARDS = 56;
    public $TRUMP_PATH = "png/";
    public $BACK = "z02.png";
    public $SKEL = "z.png";

    public function setCards()
    {
        $cards = array();
        for ($i = 1; $i <= 13; $i++) {
            if ($i < 10) {
                array_push($cards, "c0".$i.".png");
                array_push($cards, "d0".$i.".png");
                array_push($cards, "h0".$i.".png");
                array_push($cards, "s0".$i.".png");
            } else if ($i >= 10) {
                array_push($cards, "c".$i.".png");
                array_push($cards, "d".$i.".png");
                array_push($cards, "h".$i.".png");
                array_push($cards, "s".$i.".png");
            }
        }
        shuffle($cards);
        return $cards;
    }
}