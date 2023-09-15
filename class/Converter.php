<?php

namespace Class;

class Converter
{
    //точка входа
    public function convert(array $arr): void
    {
        $this->create($arr);
    }
    //проверяем контейнер или блок - открываем div, проходимся по дочерним массивам, закрываем div
    private function create(array $arr): void
    {
        if ($arr['type'] == 'container' || $arr['type'] == 'block') {
            $this->startDiv($arr['parameters']);
            if ($arr['children']) {
                $this->itirateChild($arr);
            }
            $this->endDiv();
        }
    }
    //метод перебора дочерних массивов
    private function itirateChild(array $arr): void
    {
        foreach ($arr['children'] as $value) {
            
            switch ($value['type']) {
            //если тип text - создаем h1 заголовок
                case 'text':
                    $this->makeText($value);
                    break;
            //если тип image - создаем изображение
                case 'image':
                    $this->makeImage($value);
                    break;
            //если тип button - создаем ссылку
                case 'button':
                    $this->makeButton($value);
                    break;
            //если среди детей есть контейнер или блок, возвращаемся в метод create и проходимся по их дочерним массивам
                case 'container':
                case 'block':
                    $this->create($value);
                    break;
            }

        } 
    }
    //метод для создания ссылки
    private function makeButton(array $arr): string
    {
        return printf('<a href="%s" %s>%s</a>', 
        $arr['payload']['link']['payload'], 
        $this->setStyle($arr['parameters']), 
        $arr['payload']['text']);
    }
    //метод для создания картинки
    private function makeImage(array $arr): string
    {
        return printf('<img src="%s" %s>', $arr['payload']['image']['url'], $this->setStyle($arr['parameters']));
    }
    //метод для создания h1 заголовка
    //в задании сказано создать текст без уточнения каким тэгом
    private function makeText(array $arr): string
    {
        return printf('<h1 %s>%s</h1>', $this->setStyle($arr['parameters']), $arr['payload']['text']);
    }
    //метод для открытия div, если есть параметры - передаем
    private function startDiv(?array $parameters = null): void
    {
        if ($parameters) {
            echo '<div '. $this->setStyle($parameters) . '>';
        } else {
            echo '<div>';
        }
    }
    //метод для закрытия div
    private function endDiv(): void
    {
        echo '</div>';
    }
    //метод для перебора массива параметров - создаем и возвращаем строку css стилей (стиль:значение)
    private function setStyle(?array $parameters = null): ?string
    {
        //проверяем, что пришли параметры, и проходимся по ним
        if ($parameters) {

        $styles = 'style="';

            foreach ($parameters as $parameter => $value) {
                //переводим из json к css
                //пример - backgroundColor к background-сolor
                if (preg_match_all('/[A-Z]/', $parameter, $matches)) {
                    $parameter = str_replace($matches[0][0], '-'. strtolower($matches[0][0]), $parameter);
                }
                if (!$value) {
                    return null;
                }
                $styles .= "$parameter:$value;";

            }

        $styles .= '"';

        return $styles;

        }

        return null;
    }

}