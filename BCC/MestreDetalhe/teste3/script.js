let inputCount = 0; // Contador para as entradas

function addInput() {
    // Obtém o valor da caixa de texto usando o id 'inputText'
    const inputText = document.getElementById('inputText').value;

    // Verifica se a caixa de texto não está vazia
    if (inputText.trim() === '') {
        alert('Por favor, insira uma informação válida.');
        return; // Se estiver vazia, exibe um alerta e sai da função
    }

    if (inputCount <= 6) {
        // Incrementa o contador de entradas
        inputCount++;

        // Seleciona o corpo da tabela onde as linhas serão adicionadas
        const tableBody = document.querySelector('#infoTable tbody');

        // Cria uma nova linha (<tr>) na tabela
        const newRow = document.createElement('tr');

        // Cria a primeira célula (<td>) para o número da linha
        const cellIndex = document.createElement('td');
        cellIndex.textContent = inputCount; // Define o conteúdo da célula como o número da entrada

        // Cria a segunda célula (<td>) para o valor inserido
        const cellValue = document.createElement('td');
        cellValue.textContent = inputText; // Define o conteúdo da célula como o texto inserido

        const cellAction = document.createElement('td');
        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remover';
        removeBtn.className = 'remove-btn';
        removeBtn.onclick = function () {
            removeRow(newRow);
        };

        cellAction.appendChild(removeBtn);

        // Adiciona as células à nova linha
        newRow.appendChild(cellIndex);
        newRow.appendChild(cellValue);
        newRow.appendChild(cellAction);

        // Adiciona a nova linha ao corpo da tabela
        tableBody.appendChild(newRow);

        // Limpa o campo de texto após adicionar a informação
        document.getElementById('inputText').value = '';
    } else {
        alert('Quantidade máxima atingida.');
        return;
    }
}

function removeRow(row) {
    row.remove();
}