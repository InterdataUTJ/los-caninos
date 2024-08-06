const validaciones = {
  longitud: (datos, min, max) => {
    if (!datos) return false;
    return datos.length >= min && datos.length <= max;
  },
  
  longitudMax: (datos, longitud) => {
    if (!datos) return false;
    return datos.length <= longitud;
  },

  longitudMin: (datos, longitud) => {
    if (!datos) return false;
    return datos.length >= longitud;
  },

  numero: (datos) => {
    if (!datos) return false;
    return !isNaN(datos);
  },

  numeroMin: (datos, min) => {
    if (!datos) return false;
    if (isNaN(datos)) return false;
    return datos >= min;
  },

  numeroMax: (datos, max) => {
    if (!datos) return false;
    if (isNaN(datos)) return false;
    return datos <= max;
  },

  email: (datos) => {
    if (!datos) return false;
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(datos);
  },

  telefono: (datos) => {
    if (!datos) return false;
    return /^\d{7,15}$/g.test(datos);
  },

  date: (datos) => {
    if (!datos) return false;
    return /^\d{4}-(0[1-9]|1[0,1,2])-(0[1-9]|[12][0-9]|3[01])$/g.test(datos);
  }
};