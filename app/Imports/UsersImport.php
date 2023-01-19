<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Test;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // nos permite insertar segun la cabecera del archivo en excel
use Maatwebsite\Excel\Concerns\WithBatchInserts; // nmos permite seleccionar la cantidad de registros a insertrar
use Maatwebsite\Excel\Concerns\WithChunkReading; //nos ayuda a manejar archivos grandes
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    private $categories;
    public function __construct()
    {
        $this->categories = Category::pluck('id', 'name');
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Test([
            'name' => $row['name'],
            'last_name' => $row['last_name'],
            'age' => $row['age'],
            'address' => $row['address'],
            'date' => $row['fecha'],
            'category_id' => $this->categories[$row['categoria']] //Implementacion para anexar excel
            //con id
        ]);
    }
    public function batchSize(): int
    {
        return 100;
    }
    public function chunkSize(): int
    {
        return 100;
    }
    public function rules(): array
    {
        return [
            '*.name' => [
                'alpha',
                'required'
            ],
            /*
            '*.last_name' => [
                'string',
                'required'
            ],
            '*.age' => [
                'numeric',
                'required'
            ],
            '*.address' => Rule::in(['@']),

            '*.fecha' => [
                'date',
                'required'
            ],
            '*.categori' => [
                'string',
                'required'
            ]*/
        ];
    }
}
