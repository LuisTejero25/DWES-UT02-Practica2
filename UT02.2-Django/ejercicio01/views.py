from django.shortcuts import render
import json

# Vista principal que muestra los datos del usuario y sus pagos mensuales
def usuario_pagos(request):
    # Datos del usuario en formato JSON 
    usuario_json = """
     [
        {
            "id": 1,
            "nombre": "Luis",
            "apellidos": "Tejero",
            "dni": "12345678A",
            "email": "luis@fpvirtualaragon.es",
            "telefono": "600123456",
            "pagos": {
                "enero": 20, "febrero": 20, "marzo": 20, "abril": 0,
                "mayo": 20, "junio": 20, "julio": 20, "agosto": 0,
                "septiembre": 20, "octubre": 20, "noviembre": 20, "diciembre": 20
            }
        },
        {
            "id": 2,
            "nombre": "Ana",
            "apellidos": "Martínez",
            "dni": "87654321B",
            "email": "ana@fpvirtualaragon.es",
            "telefono": "600654321",
            "pagos": {
                "enero": 20, "febrero": 0, "marzo": 20, "abril": 20,
                "mayo": 20, "junio": 0, "julio": 20, "agosto": 20,
                "septiembre": 20, "octubre": 0, "noviembre": 20, "diciembre": 20
            }
        },
        {
            "id": 3,
            "nombre": "Miguel",
            "apellidos": "López",
            "dni": "11223344C",
            "email": "miguel@fpvirtualaragon.es",
            "telefono": "600112233",
            "pagos": {
                "enero": 20, "febrero": 20, "marzo": 0, "abril": 20,
                "mayo": 20, "junio": 20, "julio": 0, "agosto": 20,
                "septiembre": 20, "octubre": 20, "noviembre": 20, "diciembre": 0
            }
        },
        {
            "id": 4,
            "nombre": "Arturo",
            "apellidos": "Ruiz",
            "dni": "55667788D",
            "email": "arturo@fpvirtualaragon.es",
            "telefono": "600556677",
            "pagos": {
                "enero": 0, "febrero": 20, "marzo": 20, "abril": 20,
                "mayo": 0, "junio": 20, "julio": 20, "agosto": 20,
                "septiembre": 0, "octubre": 20, "noviembre": 20, "diciembre": 20
            }
        }
    ]
    """

    # Convertir el JSON en un diccionario de Python
    usuario = json.loads(usuario_json)

    # Calcular el total pagado en el año sumando los valores del diccionario 'pagos'
    total_pagado = sum(usuario["pagos"].values())

    # Renderizar la plantilla HTML y enviar los datos como contexto
    return render(request, 'usuarios/pagos.html', {
        'usuario': usuario,
        'total_pagado': total_pagado
    })

