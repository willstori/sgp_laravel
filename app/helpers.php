<?php

if(!function_exists('minutos')){

    function minutos($inicio, $fim){

        $dateStart = new \DateTime($inicio);
        $dateNow   = new \DateTime($fim);

        $dateDiff = $dateStart->diff($dateNow);

        $min = 0;

        $min += $dateDiff->m > 0 ? $dateDiff->m * 43800 : 0;
        $min += $dateDiff->d > 0 ? $dateDiff->d * 1440 : 0;
        $min += $dateDiff->h > 0 ? $dateDiff->h * 60 : 0;
        $min += $dateDiff->i;

        return $min;

    }

}

if(!function_exists('horas_minutos')){

    function horas_minutos($minutos){

        return ((int) ($minutos / 60) ) . ' hr(s) ' . $minutos % 60 . ' min(s)';

    }
}

if(!function_exists('data_tempo')){

    function data_tempo($data_banco){

        if(!empty($data_banco)){

            $array = explode(' ', $data_banco);

            $data = implode("/", array_reverse(explode("-", $array[0])));

            $data .= ' ' . $array[1];

            return $data;

        }else{

            return null;

        }


    }

}

if(!function_exists('data')){

    function data($data_banco){

        if(!empty($data_banco)){

            return implode("/", array_reverse(explode("-", $data_banco)));

        }else{

            return null;

        }

    }

}





