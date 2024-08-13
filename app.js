// Clase LeccionMatematica
class LeccionMatematica {
  constructor(titulo, contenido, nivel, botonEjercicio) {
    this.titulo = titulo;
    this.contenido = contenido;
    this.nivel = nivel;
    this.botonEjercicio = botonEjercicio;
  }

  mostrarContenido() {
    const contenidoElement = document.getElementById('contenido');
    contenidoElement.innerHTML = `
      <h2>${this.titulo}</h2>
      <p>Nivel: ${this.nivel}</p>
      <div>${this.contenido}</div>
      <button onclick="${this.botonEjercicio}">Veamos si entendiste el tema</button>
    `;
  }
}

// Funciones síncronas para mostrar lecciones
function mostrarLeccionSincrona1() {
  const leccion = new LeccionMatematica(
    'Introducción a las fracciones',
    `
      <p>Las fracciones son expresiones matemáticas que representan una parte de un todo o una cantidad en relación a otra. Se componen de dos números enteros separados por una línea horizontal o diagonal, llamados numerador y denominador.</p>
      <p>El numerador, ubicado en la parte superior, indica la cantidad de partes que se están considerando del total. El denominador, ubicado en la parte inferior, indica la cantidad total de partes iguales en las que se ha dividido la unidad o el entero.</p>
      <img src="imagenes/fraccion1.jpg" alt="Representación de una fracción">
    `,
    'básico',
    'mostrarEjercicio1()'
  );
  leccion.mostrarContenido();
}

function mostrarLeccionSincrona2() {
  const leccion = new LeccionMatematica(
    'Tipos de fracciones',
    `
      <p>Existen tres tipos principales de fracciones:</p>
      <ol>
        <li>Fracciones propias: Son aquellas en las que el numerador es menor que el denominador. Representan una cantidad menor que la unidad o el entero. Por ejemplo, 2/5 o 3/4.</li>
        <li>Fracciones impropias: Son aquellas en las que el numerador es mayor o igual que el denominador. Representan una cantidad mayor o igual que la unidad o el entero. Por ejemplo, 5/3 o 7/7.</li>
        <li>Fracciones mixtas: Son una combinación de un número entero y una fracción propia. Se utilizan para representar cantidades mayores que la unidad o el entero. Por ejemplo, 1 3/4 o 2 1/2.</li>
      </ol>
      <img src="imagenes/tipos_fracciones.jpg" alt="Tipos de fracciones">
    `,
    'básico',
    'mostrarEjercicio2()'
  );
  leccion.mostrarContenido();
}

function mostrarLeccionSincrona3() {
  const leccion = new LeccionMatematica(
    'Fracciones equivalentes',
    `
      <p>Las fracciones equivalentes son aquellas que representan la misma cantidad o proporción, aunque se expresen de manera diferente. Se obtienen al multiplicar o dividir tanto el numerador como el denominador por un mismo número distinto de cero.</p>
      <p>Por ejemplo, las fracciones 1/2, 2/4, 3/6 y 4/8 son equivalentes, ya que todas representan la mitad de una unidad o entero.</p>
      <p>Las fracciones equivalentes tienen la propiedad de que al simplificarlas se obtiene la misma fracción irreducible. La fracción irreducible es aquella en la que el numerador y el denominador no tienen factores comunes distintos de 1.</p>
    `,
    'intermedio',
    'mostrarEjercicio3()'
  );
  leccion.mostrarContenido();
  
}

function mostrarLeccionSincrona4() {
  const leccion = new LeccionMatematica(
    'Comparación de fracciones',
    `
      <p>Para comparar fracciones y determinar cuál es mayor o menor, es necesario encontrar un común denominador. Esto se logra encontrando el mínimo común múltiplo (MCM) de los denominadores.</p>
      <p>Una vez que las fracciones tienen el mismo denominador, se pueden comparar directamente sus numeradores. Si los numeradores son iguales, las fracciones son equivalentes. Si un numerador es mayor que otro, esa fracción es mayor.</p>
      <p>Otra forma de comparar fracciones es convertirlas a decimal y luego compararlas. Para convertir una fracción a decimal, se divide el numerador entre el denominador.</p>
    `,
    'intermedio',
    'mostrarEjercicio4()'
  );
  leccion.mostrarContenido();
  
}

function mostrarLeccionAsincrona1() {
  return new Promise((resolve) => {
    setTimeout(() => {
      const leccion = new LeccionMatematica(
        'Suma y resta de fracciones',
        `
          <p>Para sumar o restar fracciones, es necesario que tengan el mismo denominador. Si no lo tienen, se debe encontrar el mínimo común múltiplo (MCM) de los denominadores y convertir las fracciones a equivalentes con ese denominador.</p>
          <p>Una vez que las fracciones tienen el mismo denominador, se suman o restan los numeradores y se mantiene el denominador común. El resultado es una nueva fracción que puede simplificarse si es posible.</p>
          <p>Por ejemplo, para sumar 1/3 + 1/6, primero se convierten a fracciones equivalentes con el mismo denominador: 2/6 + 1/6 = 3/6, que se simplifica a 1/2.</p>
        `,
        'intermedio',
        'mostrarEjercicioAsincrono1()'
      );
      resolve(leccion);
      mostrarEjercicioAsincrono1();
    }, 1000);
  });
}

function mostrarLeccionAsincrona2() {
  return new Promise((resolve) => {
    setTimeout(() => {
      const leccion = new LeccionMatematica(
        'Multiplicación de fracciones',
        `
          <p>Para multiplicar fracciones, se multiplican los numeradores entre sí y los denominadores entre sí. El resultado es una nueva fracción que se puede simplificar si es necesario.</p>
          <p>La multiplicación de fracciones cumple con las propiedades conmutativa, asociativa y distributiva.</p>
          <p>Por ejemplo, para multiplicar 2/3 × 4/5, se multiplican los numeradores (2 × 4 = 8) y los denominadores (3 × 5 = 15), obteniendo como resultado 8/15.</p>
        `,
        'intermedio',
        'mostrarEjercicioAsincrono2()'
      );
      resolve(leccion);
      mostrarEjercicioAsincrono2();
    }, 1500);
  });
}

function mostrarLeccionAsincrona3() {
  return new Promise((resolve) => {
    setTimeout(() => {
      const leccion = new LeccionMatematica(
        'División de fracciones',
        `
          <p>Para dividir fracciones, se multiplica la primera fracción por el recíproco de la segunda fracción. El recíproco de una fracción se obtiene intercambiando el numerador y el denominador.</p>
          <p>Por ejemplo, para dividir 2/3 ÷ 4/5, primero se obtiene el recíproco de 4/5, que es 5/4. Luego, se multiplica 2/3 × 5/4, obteniendo como resultado 10/12, que se simplifica a 5/6.</p>
          <p>La división de fracciones no cumple con la propiedad conmutativa, pero sí con la propiedad asociativa y distributiva.</p>
        `,
        'avanzado',
        'mostrarEjercicioAsincrono3()'
      );
      resolve(leccion);
      mostrarEjercicioAsincrono3();
    }, 2000);
  });
}

function mostrarLeccionAsincrona4() {
  return new Promise((resolve) => {
    setTimeout(() => {
      const leccion = new LeccionMatematica(
        'Fracciones mixtas',
        `
          <p>Una fracción mixta es una combinación de un número entero y una fracción propia. Se utiliza para representar cantidades mayores que la unidad o el entero.</p>
          <p>Para convertir una fracción mixta a una fracción impropia, se multiplica el entero por el denominador, se suma el numerador y se mantiene el denominador. Por ejemplo, 1 3/4 se convierte a 7/4.</p>
          <p>Para convertir una fracción impropia a mixta, se divide el numerador entre el denominador. El cociente representa la parte entera y el residuo se escribe como fracción propia. Por ejemplo, 9/4 se convierte a 2 1/4.</p>
        `,
        'intermedio',
        'mostrarEjercicioAsincrono4()'
      );
      resolve(leccion);
      mostrarEjercicioAsincrono4();
    }, 1200);
  });
}

function mostrarLeccionAsincrona5() {
  return new Promise((resolve) => {
    setTimeout(() => {
      const leccion = new LeccionMatematica(
        'Aplicaciones de las fracciones',
        `
          <p>Las fracciones tienen diversas aplicaciones en la vida cotidiana y en diferentes campos del conocimiento. Algunas de las aplicaciones más comunes son:</p>
          <ul>
            <li>Cocina: Las fracciones se utilizan para medir ingredientes y seguir recetas. Por ejemplo, 1/2 taza de azúcar o 3/4 de cucharadita de sal.</li>
            <li>Distribución: Las fracciones permiten repartir cantidades de manera equitativa. Por ejemplo, si se quiere dividir una pizza entre 4 personas, cada persona recibiría 1/4 de la pizza.</li>
            <li>Probabilidad: Las fracciones se utilizan para expresar la probabilidad de que ocurra un evento. Por ejemplo, si hay 3 bolas rojas y 2 bolas azules en una bolsa, la probabilidad de sacar una bola roja es de 3/5.</li>
            <li>Porcentajes: Los porcentajes y las fracciones están estrechamente relacionados. Un porcentaje puede expresarse como una fracción con denominador 100. Por ejemplo, 75% es equivalente a 75/100 o 3/4.</li>
          </ul>
          <img src="imagenes/aplicaciones_fracciones.jpg" alt="Aplicaciones de las fracciones">
        `,
        'intermedio',
        'mostrarEjercicioAsincrono5()'
      );
      resolve(leccion);
      mostrarEjercicioAsincrono5();
    }, 1800);
  });
}

// Obtener referencias a los elementos del menú asíncrono
const opcionAsincrona1 = document.getElementById('opcion-asincrona-1');
const opcionAsincrona2 = document.getElementById('opcion-asincrona-2');
const opcionAsincrona3 = document.getElementById('opcion-asincrona-3');
const opcionAsincrona4 = document.getElementById('opcion-asincrona-4');
const opcionAsincrona5 = document.getElementById('opcion-asincrona-5');

//eventos de clic a las opciones del menú asíncrono
opcionAsincrona1.addEventListener('click', () => {
  mostrarLeccionAsincrona1().then((leccion) => {
    leccion.mostrarContenido();
  });
});

opcionAsincrona2.addEventListener('click', () => {
  mostrarLeccionAsincrona2().then((leccion) => {
    leccion.mostrarContenido();
  });
});

opcionAsincrona3.addEventListener('click', () => {
  mostrarLeccionAsincrona3().then((leccion) => {
    leccion.mostrarContenido();
  });
});

opcionAsincrona4.addEventListener('click', () => {
  mostrarLeccionAsincrona4().then((leccion) => {
    leccion.mostrarContenido();
  });
});

opcionAsincrona5.addEventListener('click', () => {
  mostrarLeccionAsincrona5().then((leccion) => {
    leccion.mostrarContenido();
  });
});

// Obtener referencias a los elementos del menú síncrono
const opcionSincrona1 = document.getElementById('opcion-sincrona-1');
const opcionSincrona2 = document.getElementById('opcion-sincrona-2');
const opcionSincrona3 = document.getElementById('opcion-sincrona-3');
const opcionSincrona4 = document.getElementById('opcion-sincrona-4');

//eventos de clic a las opciones del menú síncrono
opcionSincrona1.addEventListener('click', mostrarLeccionSincrona1);
opcionSincrona2.addEventListener('click', mostrarLeccionSincrona2);
opcionSincrona3.addEventListener('click', mostrarLeccionSincrona3);
opcionSincrona4.addEventListener('click', mostrarLeccionSincrona4);


function mostrarEjercicio1() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Introducción a las fracciones</h3>
    <div id="grafica-fraccion"></div>
    <p>¿Qué fracción se muestra en la gráfica?</p>
    <input type="text" id="fraccion-usuario" placeholder="Fracción (a/b)">
    <button onclick="verificarFraccion()">Verificar</button>
    <button onclick="generarNuevaFraccion()">Nueva fracción</button>
    <p id="resultado-fraccion"></p>
  `;

  generarNuevaFraccion();
}

function generarNuevaFraccion() {
  const numerador = Math.floor(Math.random() * 10) + 1;
  const denominador = Math.floor(Math.random() * 10) + 1;
  dibujarGrafica(numerador, denominador);
}

function dibujarGrafica(numerador, denominador) {
  const graficaElement = document.getElementById('grafica-fraccion');
  graficaElement.innerHTML = ''; // Limpiar la gráfica anterior

  const anchoTotal = 200;
  const altoTotal = 200;
  const filas = 2;
  const columnas = Math.ceil(denominador / filas);
  const anchoParte = anchoTotal / columnas;
  const altoParte = altoTotal / filas;
  const totalPartes = filas * columnas;

  const grafica = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  grafica.setAttribute('width', anchoTotal);
  grafica.setAttribute('height', altoTotal);

  for (let i = 0; i < totalPartes; i++) {
    const fila = Math.floor(i / columnas);
    const columna = i % columnas;
    const parte = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
    parte.setAttribute('x', columna * anchoParte);
    parte.setAttribute('y', fila * altoParte);
    parte.setAttribute('width', anchoParte);
    parte.setAttribute('height', altoParte);
    parte.setAttribute('fill', i < numerador ? 'green' : 'white');
    parte.setAttribute('stroke', 'black');
    parte.setAttribute('stroke-width', 2);
    grafica.appendChild(parte);
  }

  const etiquetaFraccion = document.createElementNS('http://www.w3.org/2000/svg', 'text');
  etiquetaFraccion.setAttribute('x', anchoTotal + 10);
  etiquetaFraccion.setAttribute('y', altoTotal / 2);
  etiquetaFraccion.setAttribute('text-anchor', 'start');
  etiquetaFraccion.setAttribute('alignment-baseline', 'middle');
  etiquetaFraccion.setAttribute('font-size', '24px');
  etiquetaFraccion.textContent = `${numerador}/${totalPartes}`;
  grafica.appendChild(etiquetaFraccion);

  graficaElement.appendChild(grafica);

  // Guardar la fracción generada para verificar la respuesta del usuario
  graficaElement.dataset.fraccion = `${numerador}/${totalPartes}`;
}
function verificarFraccion() {
  const fraccionUsuario = document.getElementById('fraccion-usuario').value;
  const fraccionCorrecta = document.getElementById('grafica-fraccion').dataset.fraccion;
  const resultadoElement = document.getElementById('resultado-fraccion');

  if (fraccionUsuario === fraccionCorrecta) {
    resultadoElement.textContent = '¡Correcto! La fracción es ' + fraccionCorrecta;
  } else {
    resultadoElement.textContent = 'Incorrecto. La fracción correcta es ' + fraccionCorrecta;
  }
}

function mostrarEjercicio2() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Clasificar fracciones</h3>
    <p>Selecciona el tipo de fracción para cada una de las siguientes fracciones:</p>
    <ul>
      <li>
        <span>2/5</span>
        <select onchange="clasificarFraccion(this)">
          <option value="">Seleccionar tipo</option>
          <option value="propia">Propia</option>
          <option value="impropia">Impropia</option>
          <option value="mixta">Mixta</option>
        </select>
      </li>
      <li>
        <span>7/3</span>
        <select onchange="clasificarFraccion(this)">
          <option value="">Seleccionar tipo</option>
          <option value="propia">Propia</option>
          <option value="impropia">Impropia</option>
          <option value="mixta">Mixta</option>
        </select>
      </li>
      <li>
        <span>1 1/4</span>
        <select onchange="clasificarFraccion(this)">
          <option value="">Seleccionar tipo</option>
          <option value="propia">Propia</option>
          <option value="impropia">Impropia</option>
          <option value="mixta">Mixta</option>
        </select>
      </li>
    </ul>
  `;
}

function clasificarFraccion(selectElement) {
  const fraccionElement = selectElement.parentElement.querySelector('span');
  const fraccion = fraccionElement.textContent;
  const tipo = selectElement.value;
  
  if (tipo === 'propia') {
    fraccionElement.style.color = 'green';
  } else if (tipo === 'impropia') {
    fraccionElement.style.color = 'blue';
  } else if (tipo === 'mixta') {
    fraccionElement.style.color = 'orange';
  } else {
    fraccionElement.style.color = 'black';
  }
}

function mostrarEjercicio3() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Fracciones equivalentes</h3>
    <p>Ingresa una fracción y encuentra sus fracciones equivalentes:</p>
    <input type="text" id="fraccion-equivalente" placeholder="Fracción (a/b)">
    <button onclick="encontrarEquivalentes()">Encontrar equivalentes</button>
    <p id="resultado-equivalentes"></p>
  `;
}

function encontrarEquivalentes() {
  const fraccionInput = document.getElementById('fraccion-equivalente').value;
  const [numerador, denominador] = fraccionInput.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-equivalentes');

  if (numerador && denominador) {
    const equivalentes = [];
    for (let i = 1; i <= 5; i++) {
      const nuevoNumerador = numerador * i;
      const nuevoDenominador = denominador * i;
      equivalentes.push(`${nuevoNumerador}/${nuevoDenominador}`);
    }
    resultadoElement.textContent = `Fracciones equivalentes: ${equivalentes.join(', ')}`;
  } else {
    resultadoElement.textContent = 'Ingresa una fracción válida (a/b)';
  }
}

function mostrarEjercicio4() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Comparación de fracciones</h3>
    <p>Ingresa dos fracciones y compáralas:</p>
    <input type="text" id="fraccion-comparar1" placeholder="Fracción 1 (a/b)">
    <input type="text" id="fraccion-comparar2" placeholder="Fracción 2 (c/d)">
    <button onclick="compararFracciones()">Comparar fracciones</button>
    <p id="resultado-comparacion"></p>
  `;
}

function compararFracciones() {
  const fraccion1Input = document.getElementById('fraccion-comparar1').value;
  const fraccion2Input = document.getElementById('fraccion-comparar2').value;
  const [numerador1, denominador1] = fraccion1Input.split('/').map(Number);
  const [numerador2, denominador2] = fraccion2Input.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-comparacion');

  if (numerador1 && denominador1 && numerador2 && denominador2) {
    const valor1 = numerador1 / denominador1;
    const valor2 = numerador2 / denominador2;

    if (valor1 > valor2) {
      resultadoElement.textContent = `${fraccion1Input} es mayor que ${fraccion2Input}`;
    } else if (valor1 < valor2) {
      resultadoElement.textContent = `${fraccion1Input} es menor que ${fraccion2Input}`;
    } else {
      resultadoElement.textContent = `${fraccion1Input} es igual a ${fraccion2Input}`;
    }
  } else {
    resultadoElement.textContent = 'Ingresa fracciones válidas (a/b) y (c/d)';
  }
}

function mostrarEjercicioAsincrono1() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Suma de fracciones</h3>
    <p>Ingresa dos fracciones para sumarlas:</p>
    <input type="text" id="fraccion-suma1" placeholder="Fracción 1 (a/b)">
    <input type="text" id="fraccion-suma2" placeholder="Fracción 2 (c/d)">
    <button onclick="sumarFracciones()">Sumar fracciones</button>
    <p id="resultado-suma"></p>
  `;
}

function sumarFracciones() {
  const fraccion1Input = document.getElementById('fraccion-suma1').value;
  const fraccion2Input = document.getElementById('fraccion-suma2').value;
  const [numerador1, denominador1] = fraccion1Input.split('/').map(Number);
  const [numerador2, denominador2] = fraccion2Input.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-suma');

  if (numerador1 && denominador1 && numerador2 && denominador2) {
    const denominadorComun = denominador1 * denominador2;
    const numeradorSuma = numerador1 * denominador2 + numerador2 * denominador1;
    const fraccionSuma = `${numeradorSuma}/${denominadorComun}`;
    resultadoElement.textContent = `La suma de ${fraccion1Input} y ${fraccion2Input} es ${fraccionSuma}`;
  } else {
    resultadoElement.textContent = 'Ingresa fracciones válidas (a/b) y (c/d)';
  }
}

function mostrarEjercicioAsincrono2() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Multiplicación de fracciones</h3>
    <p>Ingresa dos fracciones para multiplicarlas:</p>
    <input type="text" id="fraccion-multiplicacion1" placeholder="Fracción 1 (a/b)">
    <input type="text" id="fraccion-multiplicacion2" placeholder="Fracción 2 (c/d)">
    <button onclick="multiplicarFracciones()">Multiplicar fracciones</button>
    <p id="resultado-multiplicacion"></p>
  `;
}

function multiplicarFracciones() {
  const fraccion1Input = document.getElementById('fraccion-multiplicacion1').value;
  const fraccion2Input = document.getElementById('fraccion-multiplicacion2').value;
  const [numerador1, denominador1] = fraccion1Input.split('/').map(Number);
  const [numerador2, denominador2] = fraccion2Input.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-multiplicacion');

  if (numerador1 && denominador1 && numerador2 && denominador2) {
    const numeradorMultiplicacion = numerador1 * numerador2;
    const denominadorMultiplicacion = denominador1 * denominador2;
    const fraccionMultiplicacion = `${numeradorMultiplicacion}/${denominadorMultiplicacion}`;
    resultadoElement.textContent = `La multiplicación de ${fraccion1Input} y ${fraccion2Input} es ${fraccionMultiplicacion}`;
  } else {
    resultadoElement.textContent = 'Ingresa fracciones válidas (a/b) y (c/d)';
  }
}

function mostrarEjercicioAsincrono3() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: División de fracciones</h3>
    <p>Ingresa dos fracciones para dividirlas:</p>
    <input type="text" id="fraccion-division1" placeholder="Fracción 1 (a/b)">
    <input type="text" id="fraccion-division2" placeholder="Fracción 2 (c/d)">
    <button onclick="dividirFracciones()">Dividir fracciones</button>
    <p id="resultado-division"></p>
  `;
}

function dividirFracciones() {
  const fraccion1Input = document.getElementById('fraccion-division1').value;
  const fraccion2Input = document.getElementById('fraccion-division2').value;
  const [numerador1, denominador1] = fraccion1Input.split('/').map(Number);
  const [numerador2, denominador2] = fraccion2Input.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-division');

  if (numerador1 && denominador1 && numerador2 && denominador2) {
    const numeradorDivision = numerador1 * denominador2;
    const denominadorDivision = denominador1 * numerador2;
    const fraccionDivision = `${numeradorDivision}/${denominadorDivision}`;
    resultadoElement.textContent = `La división de ${fraccion1Input} entre ${fraccion2Input} es ${fraccionDivision}`;
  } else {
    resultadoElement.textContent = 'Ingresa fracciones válidas (a/b) y (c/d)';
  }
}

function mostrarEjercicioAsincrono4() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Convertir fracción mixta a impropia</h3>
    <p>Ingresa una fracción mixta para convertirla a fracción impropia:</p>
    <input type="text" id="fraccion-mixta" placeholder="Fracción mixta (a b/c)">
    <button onclick="convertirMixtaAImpropia()">Convertir a impropia</button>
    <p id="resultado-mixta-impropia"></p>
  `;
}

function convertirMixtaAImpropia() {
  const fraccionMixtaInput = document.getElementById('fraccion-mixta').value;
  const [entero, fraccion] = fraccionMixtaInput.split(' ');
  const [numerador, denominador] = fraccion.split('/').map(Number);
  const resultadoElement = document.getElementById('resultado-mixta-impropia');

  if (entero && numerador && denominador) {
    const numeradorImpropia = Number(entero) * denominador + numerador;
    const fraccionImpropia = `${numeradorImpropia}/${denominador}`;
    resultadoElement.textContent = `La fracción impropia de ${fraccionMixtaInput} es ${fraccionImpropia}`;
  } else {
    resultadoElement.textContent = 'Ingresa una fracción mixta válida (a b/c)';
  }
}

function mostrarEjercicioAsincrono5() {
  const contenidoElement = document.getElementById('contenido');
  contenidoElement.innerHTML += `
    <h3>Ejercicio: Aplicación de fracciones</h3>
    <p>Un grupo de amigos quiere dividir una pizza en partes iguales. Si la pizza se divide en 8 porciones y hay 3 amigos, ¿qué fracción de la pizza le corresponde a cada amigo?</p>
    <button onclick="resolverProblema()">Resolver problema</button>
    <p id="resultado-problema"></p>
  `;
}

function resolverProblema() {
  const resultadoElement = document.getElementById('resultado-problema');
  const porcionesPizza = 8;
  const numAmigos = 3;
  const fraccionPorAmigo = `${porcionesPizza / numAmigos}/8`;
  resultadoElement.textContent = `A cada amigo le corresponde ${fraccionPorAmigo} de la pizza.`;
}