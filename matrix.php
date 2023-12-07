<?php

class Matrix {
    private array $container;

    private array $unique = [];

    public function __construct(
        private readonly int $w,
        private readonly int $h
    ) {
        $this->container = $this->init($w, $h);
    }


    private function init(int $w, int $h): array
    {

        $arr = [];

        for($i = 0; $i < $w; $i++) {

            $arr[] = [];

            for($j = 0; $j < $h; $j++) {
                $arr[$i][$j] = $this->generate($i, $j);
            }
        }

        return $arr;
    }

    private function generate(int $x, int $y): int
    {
        $value = rand(0, $this->w * $this->h);

        $existsX = $this->unique['x'][$value];
        $existsY = $this->unique['y'][$value];

        if(!$existsX && !$existsY) {
            $this->unique['x'][$value] = true;
            $this->unique['y'][$value] = true;
            return $value;
        }

        return $this->generate($x, $y);
    }

    public function getMatrix(): array
    {
        return $this->container;
    }

}


$m = new Matrix(10, 10);

var_dump($m->getMatrix());