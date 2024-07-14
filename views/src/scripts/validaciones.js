const validaciones = {
  longitud: (datos, longitud) => {
    if (!datos) return false;
    return datos.length == longitud;
  },
  
  longitudMax: (datos, longitud) => {
    if (!datos) return false;
    return datos.length <= longitud;
  },

  longitudMin: (datos, longitud) => {
    if (!datos) return false;
    return datos.length >= longitud;
  },

  email: (datos) => {
    if (!datos) return false;
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(datos);
  },

  telefono: (datos) => {
    if (!datos) return false;
    return /^\d{7,15}$/g.test(datos);
  }
};