package dwes.ut02.practica2.beans;

import java.util.Map;

public class Usuario {
      // Atributos básicos del socio
    private int id;
    private String nombre;
    private String apellidos;
    private String dni;
    private int edad;
    private String email;
    private String telefono;
    private Map<String, Double> pagos;// Mapa con los pagos mensuales

    // Constructor vacío 
    public Usuario() {
    }

    // Constructor con parámetros que inicializa todos los datos del socio
    public Usuario(int id, String nombre, String apellidos, String dni, 
        String email, int edad, String telefono, Map<String, Double> pagos) {
        this.id = id;
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.dni = dni;
        this.email = email;
        this.edad = edad;
        this.telefono = telefono;
        this.pagos = pagos;
    }

    // Getters y Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getNombre() { return nombre; }
    public void setNombre(String nombre) { this.nombre = nombre; }

    public String getApellidos() { return apellidos; }
    public void setApellidos(String apellidos) { this.apellidos = apellidos; }

    public String getDni() { return dni; }
    public void setDni(String dni) { this.dni = dni; }

    public String getEmail() { return email; }
    public void setEmail(String email) { this.email = email; }

    public int getEdad() { return edad; }
    public void setEdad(int edad) { this.edad = edad; }

    public String getTelefono() { return telefono; }
    public void setTelefono(String telefono) { this.telefono = telefono; }

    public Map<String, Double> getPagos() { return pagos; }
    public void setPagos(Map<String, Double> pagos) { this.pagos = pagos; }

    // Método toString sobrescrito para mostrar los datos del usuario en texto
    @Override
    public String toString() {
        return "Usuario [id=" + id + ", nombre=" + nombre + ", apellidos=" 
                        + apellidos + ", dni=" + dni + ", email=" + email + 
                        ", edad=" + edad +", telefono=" + telefono + "]";
    }
}
