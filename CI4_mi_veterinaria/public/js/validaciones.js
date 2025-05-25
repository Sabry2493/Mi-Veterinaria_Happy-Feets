//INPUT PARA PONER OTRA ESPECIE
function toggleOtraEspecie() {
    const select = document.getElementById('especie');
    const otraEspecie = document.getElementById('otra-especie-container');
    otraEspecie.style.display = (select.value === 'Otra') ? 'block' : 'none';
}
//INPUT PARA PONER OTRA ESPECIALIDAD
function toggleOtraEspecialidad() {
    const select = document.getElementById('especialidad');
    const otraEspecie = document.getElementById('otra-especialidad-container');
    otraEspecie.style.display = (select.value === 'Otra especialidad') ? 'block' : 'none';
}

//VER QUE MASCOTAS TIENE ACTUALMENTE RELACIONADAS ANTES DEL ALTA
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btn-comprobar-mascotas');

    if (btn) {
        btn.addEventListener('click', function () {
            const url = btn.getAttribute('data-url');
            const dni = document.getElementById('dni').value.trim();

            if (dni === '') {
                alert('Por favor ingrese un DNI para comprobar.');
                return;
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'dni=' + encodeURIComponent(dni)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then(data => {
                const resultadoDiv = document.getElementById('resultado-mascotas');
                const lista = document.getElementById('lista-mascotas');
                lista.innerHTML = ''; // limpiar lista anterior

                if (data.length > 0) {
                    data.forEach(mascota => {
                        const li = document.createElement('li');
                        li.textContent = mascota.nombre + ' (' + mascota.especie + ')';
                        lista.appendChild(li);
                    });
                } else {
                    const li = document.createElement('li');
                    li.textContent = 'No hay mascotas asociadas a este DNI.';
                    lista.appendChild(li);
                }

                resultadoDiv.style.display = 'block';
            })
            .catch(error => {
                console.error(error);
                alert('No se pudieron obtener las mascotas asociadas.');
            });
        });
    }
});


