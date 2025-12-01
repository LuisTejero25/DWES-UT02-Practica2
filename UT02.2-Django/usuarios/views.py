from django.shortcuts import render
import json

# Vista principal que muestra los datos del usuario y sus pagos mensuales
def usuario_pagos(request):
    # Datos del usuario en formato JSON (simulan una fuente externa)
    usuario_json = """
    {
        "nombre": "Laura",
        "apellidos": "Gómez Pérez",
        "dni": "12345678A",
        "email": "laura.gomez@example.com",
        "telefono": "654321987",
        "pagos": {
            "enero": 20,
            "febrero": 20,
            "marzo": 20,
            "abril": 0,
            "mayo": 20,
            "junio": 20,
            "julio": 20,
            "agosto": 0,
            "septiembre": 20,
            "octubre": 20,
            "noviembre": 20,
            "diciembre": 20
        }
    }
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

