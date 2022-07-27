<?php namespace App\Controller;

use App\Lib\Response;


class Home
{
    public function indexAction(Response $res)
    {
        $loremipsum = <<<EOL
            Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipiscing elit. Fusce maximus lobortis enim, 
            eget sodales massa bibendum sit amet. Duis vitae nunc mattis, hendrerit turpis ac, scelerisque augue. 
            Curabitur gravida ultrices ipsum, ac euismod ipsum fringilla ut. Fusce et consectetur nibh, 
            sit amet elementum odio. Donec sodales consectetur erat, nec hendrerit augue mattis quis. 
            Morbi dui felis, placerat at elementum quis, iaculis vitae lectus. 
            Mauris viverra urna non lorem convallis vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
            Vestibulum tempus ante vel sem ultrices dictum. Duis vestibulum tortor enim, et eleifend ligula sollicitudin dictum. 
            Cras dictum dictum orci, consectetur tempus velit pellentesque quis. 
            Praesent imperdiet mattis tortor, ut ullamcorper tellus feugiat vitae. 
            Morbi faucibus, arcu non commodo molestie, lorem mi condimentum turpis, in pulvinar justo erat a lacus. 
            Curabitur sit amet scelerisque ante. Vivamus volutpat tortor non finibus blandit. 
            Quisque massa libero, imperdiet ac pretium ac, tempus quis nibh.
            <br><br>
            Nam condimentum, erat ac porttitor facilisis, tellus magna aliquet turpis, non facilisis magna purus mattis lacus. 
            Mauris dui enim, rutrum ut fringilla sed, bibendum fermentum ipsum. Quisque et consectetur turpis. 
            Integer dictum metus in nibh iaculis, lacinia commodo velit feugiat. Sed cursus nulla ac dignissim ultrices. 
            Pellentesque ac nisl in urna lacinia dapibus. Maecenas pharetra elit dolor, nec pretium urna tristique quis. 
            Pellentesque luctus sem ligula, ac gravida turpis iaculis nec. 
            Praesent nec sapien ac felis faucibus venenatis. 
            Nulla pretium ultrices velit, vitae accumsan leo faucibus eu.
            <br><br>
            Phasellus convallis ligula nec eros finibus bibendum fringilla et magna. 
            Praesent ut justo diam. Aenean pretium fringilla nisi vitae elementum. 
            Aliquam tortor lectus, vulputate sit amet erat quis, aliquet posuere neque. 
            Cras efficitur ipsum faucibus, lobortis felis nec, consequat diam. 
            Praesent dictum mauris quis turpis eleifend, in volutpat sapien tempus. 
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            <br><br>
            Pellentesque molestie quam lorem, a congue leo imperdiet eget. 
            Nunc massa sem, laoreet a sapien eu, mattis lacinia dui. 
            Vivamus malesuada, metus a aliquam pharetra, velit enim egestas nisi, non gravida turpis sapien in justo. 
            Nam ut facilisis tortor. Nam eu urna diam. Ut at mauris ac turpis vehicula ullamcorper vel id velit. 
            Sed id tincidunt purus. Quisque posuere pharetra tortor, vel lobortis urna gravida nec.
            <br><br>
            Pellentesque vestibulum augue eget finibus varius. 
            Maecenas eleifend pulvinar quam, ac sodales metus finibus eu. 
            Nam ac euismod metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
        EOL;

        return $res->status(201)->toJSON([
            'title' => 'Hakkımızda',
            'body' => $loremipsum
        ]);
    }
}
