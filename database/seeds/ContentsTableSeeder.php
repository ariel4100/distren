<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contents')->delete();
        
        \DB::table('contents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '<h4>El crecimiento de las ventas en nuestros mercados tradicionales y la expansi&oacute;n hacia nuevas regiones determina el camino a seguir en nuestra &aacute;rea y sobre el cu&aacute;l estamos centrando el foco de nuestro trabajo.</h4>',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'home',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '{"_token":"e3AINiK5U6CGMD5nsyJKsZ9hCgNsGJU6YjlXBmk5","_method":"PUT","section":"empresa","type":"texto","title":"Empresa","text":"<p>DIStREN, es una empresa joven que nace con el objetivo de brindar a nuestros clientes un servicio de excelencia y calidad dentro del rubro de los envases. Nuestro servicio est&aacute; dirigido a satisfacer las necesidades de diferentes p&uacute;blicos orient&aacute;ndonos principalmente a la industria farmac&eacute;utica, est&eacute;tica y alimenticia. Brindamos un servicio personalizado, buscamos entender al cliente, acercarles nuevas posibilidades, crecer con sus necesidades y anticipar los cambios aprovech&aacute;ndolos para un mayor beneficio mutuo. Ofrecemos entrega diaria sin cargo dentro de Capital Federal. Respaldados por una trayectoria de la gerencia general de m&aacute;s de 15 a&ntilde;os en el rubro y con m&aacute;s de 500 productos de alt&iacute;sima calidad, DIStREN crece constantemente posicion&aacute;ndose en &nbsp;el mercado, poniendo a disposici&oacute;n la experiencia y profesionalidad de su equipo para que su empresa tenga el aliado ideal para competir en el d&iacute;a a d&iacute;a.<\\/p>","valores":"VALORES","text_valores":"<p>El primero y el m&aacute;s importante, es el respeto por los valores constituidos: &nbsp;&nbsp; &nbsp;Orientaci&oacute;n al cliente. &nbsp;&nbsp; &nbsp;Trabajo en Equipo. &nbsp;&nbsp; &nbsp;Desarrollo de las personas. &nbsp;&nbsp; &nbsp;Compromiso. &nbsp;&nbsp; &nbsp;Esp&iacute;ritu para promover cambios. &nbsp;&nbsp; &nbsp;Profesionalidad.<\\/p>","mision":"MISI\\u00d3N","text_mision":"<p>Brindar un servicio personalizado en la distribuci&oacute;n de envases basado en las necesidades de nuestros clientes.&nbsp;<\\/p>","vision":"VISI\\u00d3N","text_vision":"<p>Ocupar un lugar importante en el mercado mediante la fidelizaci&oacute;n de nuestros clientes.<\\/p>","image":null,"image_2":null,"image_3":null}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'empresa',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => NULL,
                'subtitle' => NULL,
            'text' => '{"_token":"e3AINiK5U6CGMD5nsyJKsZ9hCgNsGJU6YjlXBmk5","_method":"PUT","section":"contacto","type":"texto","title":"CONTACTO","direccion":"Conesa 3133 (C1429ALE) C.A.B.A","telefono_1":"011 5195 - 4792","telefono_2":"011 6486 - 4450","correo":"pedidos@distren.com.ar","correo_2":"ventas@distren.com.ar","image":null,"image_2":null,"image_3":null}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'contacto',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '{"_token":"thYb2ZziNloGW2e8k74zmWIx2DdqAu0MwnQRVRyL","_method":"PUT","section":"logos","type":"texto","image":"uploads\\/logos\\/texto\\/OIm6gIGsdc0KjqXUtYmcSINcUKKzKnOxuKVDtTqs.png","image_2":"uploads\\/logos\\/texto\\/zebUI2yO08QFgEjAb2bzfCmMKl8gZMnPA78oVur9.png","image_3":"uploads\\/logos\\/texto\\/umSYhOIHP0kXRb6nXzIFSp0mkaOQ9CEGi32oGm2l.png"}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'logos',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-07-24 10:46:13',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '{"_token":"thYb2ZziNloGW2e8k74zmWIx2DdqAu0MwnQRVRyL","_method":"PUT","section":"redes","type":"texto","facebook":"facebook","youtube":"youtube","image":null,"image_2":null,"image_3":null}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'redes',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-07-24 10:54:28',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '{"_token":"thYb2ZziNloGW2e8k74zmWIx2DdqAu0MwnQRVRyL","_method":"PUT","section":"condiciones","type":"texto","title":"T\\u00e9rminos y condiciones","text":null,"image":null,"image_2":null,"image_3":null}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'condiciones',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-07-24 10:54:42',
            ),
            6 => 
            array (
                'id' => 9,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '<p>Stock permanente y la m&aacute;s alta variedad&nbsp;</p>',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => 'uploads/home/cY9j8sYjUOYttN3PslS84w1x4edyYofmdUTIVcUJ.png',
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'home',
                'type' => 'imagen',
                'destacado' => 0,
                'order' => 'aa',
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 10,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '<p>La mejor calidad en nuestros productos</p>',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => 'uploads/home/MoP5biS25KQ8l4ROEog0EUxSFhW17jrCSudy1cUX.png',
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'home',
                'type' => 'imagen',
                'destacado' => 0,
                'order' => 'bb',
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 11,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '<p>M&aacute;s de 15 a&ntilde;os de Trayectoria</p>',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => 'uploads/home/xD9bK34JzdworiiuPx4pqpwvxHI60ZNBd4Hv3owa.png',
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'home',
                'type' => 'imagen',
                'destacado' => 0,
                'order' => 'cc',
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'title' => NULL,
                'subtitle' => NULL,
                'text' => '{"_token":"thYb2ZziNloGW2e8k74zmWIx2DdqAu0MwnQRVRyL","_method":"PUT","section":"carrito","type":"texto","envio":"Forma de env\\u00edo","local":null,"expreso":null,"pago":"Forma de pago","banco":"<p>BANCO: MACRO TIPO: CUENTA CORRIENTE EN PESOS NRO. DE LA CUENTA: 0-000-0000000000-0 SUC.: 000 NOMBRE DE LA CUENTA: ENVASES DISTREN CBU.: 0000000000000000000000 CUIT: 00-00000000-0 Enviar comprobante a ventasweb@distvr.com.ar<\\/p>","efectivo":null,"image":null,"image_2":null,"image_3":null}',
                'ficha' => NULL,
                'icon' => NULL,
                'image' => NULL,
                'video' => NULL,
                'link' => NULL,
                'ruta' => NULL,
                'section' => 'carrito',
                'type' => 'texto',
                'destacado' => 0,
                'order' => NULL,
                'eliminable' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-07-24 14:15:23',
            ),
        ));
        
        
    }
}