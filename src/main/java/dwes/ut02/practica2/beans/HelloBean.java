package dwes.ut02.practica2.beans;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Named;

@Named("helloBean") // @Named permite acceder al bean desde la vista con #{helloBean}
@RequestScoped    // @RequestScoped indica que el bean vive durante una petición HTTP
public class HelloBean {

    private final List<Usuario> usuarios;// Lista de usuarios que se mostrará en la vista
    
    // Constructor: inicializa la lista con varios usuarios de ejemplo
    // Cada usuario recibe un mapa de pagos generado aleatoriamente
    public HelloBean() {
        usuarios = new ArrayList<>();
        usuarios.add(new Usuario(1, "Luis", "Tejero", "12345678A",
         "luis@fpvirtualaragon.es",44, "600123456", generarPagos()));
        usuarios.add(new Usuario(2, "Ana", "Martínez", "87654321B", 
        "ana@fpvirtualaragon.es",35, "600654321", generarPagos()));
        usuarios.add(new Usuario(3, "Miguel", "López", "11223344C",
         "miguel@fpvirtualaragon.es",30, "600112233", generarPagos()));
        usuarios.add(new Usuario(4, "Arturo", "Ruiz", "55667788D",
         "arturo@fpvirtualaragon.es", 33, "600556677", generarPagos()));
    }
    // Método privado que genera un mapa de pagos mensuales
    // Cada mes puede tener un pago de 20 € o quedar como null (pendiente)
    private Map<String, Double> generarPagos() {
        Map<String, Double> pagos = new LinkedHashMap<>();
        String[] meses = {"enero", "febrero", "marzo", "abril", "mayo", "junio",
                          "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"};
        for (String mes : meses) {
            // Math.random() > 0.3 → probabilidad de ~70% de que se pague
            pagos.put(mes, Math.random() > 0.3 ? 20.0 : null);
        }
        return pagos;
    }
    // Getter para acceder a la lista de usuarios desde la vista JSF
    public List<Usuario> getUsuarios() {
        return usuarios;
    }
    // Calcula el total abonado por un usuario en el año
    // Suma todos los valores distintos de null en el mapa de pagos
    public double totalPagado(Usuario usuario) {
        double total = 0;
        for (Double cantidad : usuario.getPagos().values()) {
            if (cantidad != null) total += cantidad;
        }
        return total;
    }
    // Comprueba si el usuario está al día con la cuota
    // Según el enunciado: si el total abonado es >= 100 €, se considera al corriente
    public boolean estaAlDia(Usuario usuario) {
        return totalPagado(usuario) >= 100.0; 
    }
}
