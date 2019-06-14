<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'section' => 'home',
            'type' => 'texto',
            'text' => '<h4>El crecimiento de las ventas en nuestros mercados tradicionales y la expansi&oacute;n hacia nuevas regiones determina el camino a seguir en nuestra &aacute;rea y sobre el cu&aacute;l estamos centrando el foco de nuestro trabajo.</h4>',
        ]);
        DB::table('contents')->insert([
            'section' => 'empresa',
            'type' => 'texto',
            'text' => '{"_token":"e3AINiK5U6CGMD5nsyJKsZ9hCgNsGJU6YjlXBmk5","_method":"PUT","section":"empresa","type":"texto","title":"Empresa","text":"<p>DIStREN, es una empresa joven que nace con el objetivo de brindar a nuestros clientes un servicio de excelencia y calidad dentro del rubro de los envases. Nuestro servicio est&aacute; dirigido a satisfacer las necesidades de diferentes p&uacute;blicos orient&aacute;ndonos principalmente a la industria farmac&eacute;utica, est&eacute;tica y alimenticia. Brindamos un servicio personalizado, buscamos entender al cliente, acercarles nuevas posibilidades, crecer con sus necesidades y anticipar los cambios aprovech&aacute;ndolos para un mayor beneficio mutuo. Ofrecemos entrega diaria sin cargo dentro de Capital Federal. Respaldados por una trayectoria de la gerencia general de m&aacute;s de 15 a&ntilde;os en el rubro y con m&aacute;s de 500 productos de alt&iacute;sima calidad, DIStREN crece constantemente posicion&aacute;ndose en &nbsp;el mercado, poniendo a disposici&oacute;n la experiencia y profesionalidad de su equipo para que su empresa tenga el aliado ideal para competir en el d&iacute;a a d&iacute;a.<\/p>","valores":"VALORES","text_valores":"<p>El primero y el m&aacute;s importante, es el respeto por los valores constituidos: &nbsp;&nbsp; &nbsp;Orientaci&oacute;n al cliente. &nbsp;&nbsp; &nbsp;Trabajo en Equipo. &nbsp;&nbsp; &nbsp;Desarrollo de las personas. &nbsp;&nbsp; &nbsp;Compromiso. &nbsp;&nbsp; &nbsp;Esp&iacute;ritu para promover cambios. &nbsp;&nbsp; &nbsp;Profesionalidad.<\/p>","mision":"MISI\u00d3N","text_mision":"<p>Brindar un servicio personalizado en la distribuci&oacute;n de envases basado en las necesidades de nuestros clientes.&nbsp;<\/p>","vision":"VISI\u00d3N","text_vision":"<p>Ocupar un lugar importante en el mercado mediante la fidelizaci&oacute;n de nuestros clientes.<\/p>","image":null,"image_2":null,"image_3":null}',
        ]);
        DB::table('contents')->insert([
            'section' => 'contacto',
            'type' => 'texto',
            'text' => '{"_token":"e3AINiK5U6CGMD5nsyJKsZ9hCgNsGJU6YjlXBmk5","_method":"PUT","section":"contacto","type":"texto","title":"CONTACTO","direccion":"Conesa 3133 (C1429ALE) C.A.B.A","telefono_1":"011 5195 - 4792","telefono_2":"011 6486 - 4450","correo":"pedidos@distren.com.ar","correo_2":"ventas@distren.com.ar","image":null,"image_2":null,"image_3":null}',
        ]);
        DB::table('contents')->insert([
            'section' => 'logos',
            'type' => 'texto',
            'text' => '{"_token":"e3AINiK5U6CGMD5nsyJKsZ9hCgNsGJU6YjlXBmk5","_method":"PUT","section":"logos","type":"texto","image":"uploads\/logos\/texto\/RjEhRiyJtOh5tRm44meQxUAbxcqMaSsWGDiIuNJ8.png","image_2":"uploads\/logos\/texto\/zebUI2yO08QFgEjAb2bzfCmMKl8gZMnPA78oVur9.png","image_3":"uploads\/logos\/texto\/umSYhOIHP0kXRb6nXzIFSp0mkaOQ9CEGi32oGm2l.png"}',
        ]);
        DB::table('contents')->insert([
            'section' => 'redes',
            'type' => 'texto',
            'text' => 'home',
        ]);
        DB::table('contents')->insert([
            'section' => 'condiciones',
            'type' => 'texto',
            'text' => '',
        ]);
        DB::table('contents')->insert([
            'section' => 'redes',
            'type' => 'texto',
            'text' => '',
        ]);
        DB::table('contents')->insert([
            'section' => 'carrito',
            'type' => 'texto',
            'text' => '',
        ]);

        //TIPO IMAGEN
        DB::table('contents')->insert([
            'section' => 'home',
            'type' => 'imagen',
            'text' => '<p>Stock permanente y la m&aacute;s alta variedad&nbsp;</p>',
            'order' => 'aa',
            'image' => 'uploads/home/cY9j8sYjUOYttN3PslS84w1x4edyYofmdUTIVcUJ.png'
        ]);
        DB::table('contents')->insert([
            'section' => 'home',
            'type' => 'imagen',
            'text' => '<p>La mejor calidad en nuestros productos</p>',
            'order' => 'bb',
            'image' => 'uploads/home/MoP5biS25KQ8l4ROEog0EUxSFhW17jrCSudy1cUX.png'
        ]);
        DB::table('contents')->insert([
            'section' => 'home',
            'type' => 'imagen',
            'text' => '<p>M&aacute;s de 15 a&ntilde;os de Trayectoria</p>',
            'order' => 'cc',
            'image' => 'uploads/home/xD9bK34JzdworiiuPx4pqpwvxHI60ZNBd4Hv3owa.png'
        ]);
    }
}
