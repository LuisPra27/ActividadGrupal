<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Log;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     *@OA\Get(
     *      path="/api/estudiantes",
     *      summary="Listar todos los estudiantes",
     *      @OA\Response(response="200", description="Lista obtenida correctamente")
     */
    public function index()
    {
        return response()->json(Estudiante::with('paralelo')->get(), 200);
    }
    /**
     * Store a newly created resource in storage.
     */















     /**
*  @OA\Post(
*     path="/api/estudiantes",
*    summary="Crear un nuevo estudiante",
*  @OA\RquestBody(
*        required=true,
* @OA\JsonContent(
*      required={"nombre","cedula","correo","paralelo_id"},
*      @OA\Property(property="nombre", type="string", example="Juan Perez"),
*      @OA\Property(property="cedula", type="string", example="1234567890"),
*      @OA\Property(property="correo", type="string", example="juan@example.com")
*      @OA\Property(property="paralelo_id", type="integer", example=1)
*   )
* ),
* @OA\Parameter(
*        name="Accept",
*       in="header",
*      required=true,
* @OA\Schema(type="string", example="application/json"),
*     description="Conteniod en formato JSON"
* ),
* @OA\Response(response="201", description="Estudiante creado correctamente"),
* @OA\Response(response="422", description="Error de validación")
* )
*/

    public function store(Request $request)
    {
        Log::info('Intentado crear estudiantes', $request->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|unique:estudiantes,cedula',
            'correo' => 'required|email|unique:estudiantes,correo',
            'paralelo_id' => 'required|exists:paralelos,id',
        ]);

      $estudiante = Estudiante::create($request->all());
      Log::info('Estudiante creado con ID: ', ['id' => $estudiante->id]);

      return response()->json([
          'mensaje' => 'Estudiante creado correctamente',
          'estudiante' => $estudiante
      ], 201);
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *      path="/api/estudiantes/{id}",
     *      summary="Mostrar un estudiante específico",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID del estudiante",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(response="200", description="Estudiante encontrado"),
     *      @OA\Response(response="404", description="Estudiante no encontrado")
     * )
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('paralelo')->find($id);

        if (!$estudiante) {
            return response()->json(['mensaje' => 'Estudiante no encontrado'], 404);
        }

        return response()->json($estudiante);
    }

    // Actualizar un estudiante
    /**
     * @OA\Put(
     *     path="/api/estudiantes/{id}",
     *    summary="Actualizar un estudiante",
     *  @OA\Response(response="200", description="Estudiante actualizado correctamente")
     */
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['mensaje' => 'Estudiante no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'cedula' => 'sometimes|required|unique:estudiantes,cedula,' . $id,
            'correo' => 'sometimes|required|email|unique:estudiantes,correo,' . $id,
            'paralelo_id' => 'sometimes|required|exists:paralelos,id',
        ]);

        $estudiante->update($validated);

        return response()->json([
            'mensaje' => 'Estudiante actualizado correctamente',
            'estudiante' => $estudiante
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/api/estudiantes/{id}",
     *      summary="Eliminar un estudiante",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID del estudiantea eliminar",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(response="200", description="Estudiante eliminado correctamente"),
     *      @OA\Response(response="404", description="Estudiante no encontrado")
     * )
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['mensaje' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->delete();

        return response()->json(['mensaje' => 'Estudiante eliminado correctamente']);
    }
}


