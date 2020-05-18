<?php

use Illuminate\Database\Seeder;
use App\Pelicula;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelicula::create(['imagen_url' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fencrypted-tbn0.gstatic.com%2Fimages%3Fq%3Dtbn%3AANd9GcSiC3mSrAdG2_Tkuz5CbCm2TA-wYikac3dOPVlzb5jCk1gqsHOD&psig=AOvVaw3LdFm2fkGIaHUddSTp0vnG&ust=1589481167439000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPi25PS8sekCFQAAAAAdAAAAABAD',
        'nombre_pelicula' => 'Avengers: Endgame', 'informacion_basica' => '2019 ‧ Acción/Cine de ciencia ficción ‧ 3h 2m',
        'sinopsis' => 'Los Vengadores restantes deben encontrar una manera de recuperar a sus aliados para un enfrentamiento épico con Thanos, el malvado que diezmó el planeta y el universo.',
        'puntaje' => 4.5, 'cantidad_votos' => 598, 'url_trailer' => 'https://www.youtube.com/embed/TcMBFSGVi1c']);

        Pelicula::create(['imagen_url' => 'https://http2.mlstatic.com/poster-original-de-cine-guason-cartel-joker-dc-comics-D_NQ_NP_734302-MLM32245438730_092019-F.webp3',
        'nombre_pelicula' => 'Guasón', 'informacion_basica' => '2019 ‧ Drama/Crimen ‧ 2h 2m',
        'sinopsis' => 'Arthur Fleck adora hacer reír a la gente, pero su carrera como comediante es un fracaso. El repudio social, la marginación y una serie de trágicos acontecimientos lo conducen por el sendero de la locura y, finalmente, cae en el mundo del crimen.',
        'puntaje' => 4.8, 'cantidad_votos' => 350, 'url_trailer' => 'https://www.youtube.com/embed/t433PEQGErc']);

        Pelicula::create(['imagen_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvrR2wjVfAucVBIaE048zDXv2G3cHCmxetx27P8HHsI7wr3yoJ',
        'nombre_pelicula' => 'Capitana Marvel', 'informacion_basica' => '2019 ‧ Acción/Cine de ciencia ficción ‧ 2h 5m',
        'sinopsis' => 'Una guerrera extraterrestre de la civilización Kree se encuentra atrapada en medio de una batalla. Con la ayuda de Nick Fury trata de descubrir los secretos de su pasado mientras aprovecha sus poderes para terminar la guerra.',
        'puntaje' => 3.5, 'cantidad_votos' => 896, 'url_trailer' => 'https://www.youtube.com/embed/Z1BCujX3pw8']);

        Pelicula::create(['imagen_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSPO5lOKd7RPvg5wdNS6ZYMfC392opn2pGBxlX0My_nmXHf1RSI',
        'nombre_pelicula' => 'Mulán', 'informacion_basica' => '2020 ‧ Aventura/Acción ‧ 2 horas',
        'sinopsis' => 'El emperador chino emite un decreto que exige que cada hogar debe reclutar a un varón para luchar con el ejército imperial en la guerra contra los Hunos. Para salvar a su anciano padre de este deber, su única hija Fa Mulan se hace pasar por soldado y toma su lugar. La joven se someterá a un duro entrenamiento hasta hacerse merecedora de la estima y de la confianza del resto de su escuadrón.',
        'puntaje' => 4.9, 'cantidad_votos' => 150, 'url_trailer' => 'https://www.youtube.com/embed/KK8FHdFluOQ']);

        Pelicula::create(['imagen_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQdTJl17J5_VdMVx85Krry9e2j2KZKkuuE92ejNVAtHsNGN-3l8',
        'nombre_pelicula' => 'Bad Boys para siempre', 'informacion_basica' => '2020 ‧ Comedia/Acción ‧ 2h 4m',
        'sinopsis' => 'Los policías de la vieja escuela Mike Lowery y Marcus Burnett vuelven a patrullar juntos para derrotar al líder vicioso de un cartel de drogas de Miami. El recién creado equipo de élite AMMO del departamento de policía de Miami junto con Mike y Marcus se enfrentan al despiadado Armando Armas...',
        'puntaje' => 5, 'cantidad_votos' => 623, 'url_trailer' => 'https://www.youtube.com/embed/jKCj3XuPG8M']);
    }
}
