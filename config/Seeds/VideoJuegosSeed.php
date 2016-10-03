<?php
use Migrations\AbstractSeed;

/**
 * VideoJuegos seed.
 */
class VideoJuegosSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $productos = $this->table('productos');
        $query = $productos->find('all', [
            'conditions' => ['productos.tipo <=' => '2']
        ]);
        $query->select(['idProducto']);
        foreach ($query as $row) {
            $data = [
                'idVideoJuego' => $row,
                'ESRB' => $faker->numberBetween($min = 1, $max = 7),
                'descripcion'  => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'reqMin'  => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'reqMax'  => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ];

        $table = $this->table('video_juegos');
        $table->insert($data)->save();   
        }
   
    }
}
