function excluirRegistro(url){
    if(confirm("Tem certeza que quer excluir este registro?"))
        location.href = url;
}

function addPokemon(){
    const idPokemon = document.getElementById("pokemon").value;

    if(idPokemon.trim() === ""){
        return alert("Por favor, escolha um Pokémon para adicioná-lo.");
    }

    const tabelaPokemons = document.querySelector("#tabelaPokemons tbody");

    if(tabelaPokemons.rows.length < 6){
        const novoInput = document.createElement("input");
        novoInput.name = "pokemon"+idPokemon;
        novoInput.value = idPokemon;
        novoInput.hidden = true;
        
        const linha = document.createElement("tr");

        const nomePokemon = document.getElementById("pokemon"+idPokemon).textContent;

        const colunaNome = document.createElement("td");
        colunaNome.textContent = nomePokemon + " ";

        const remover = document.createElement("a");
        remover.textContent = "Remover";
        remover.href = "#";
        remover.onclick = function(){
            removerPokemon(linha);
        }

        const colunaRemover = document.createElement("td");
        colunaRemover.appendChild(remover);

        linha.appendChild(novoInput);
        linha.appendChild(colunaNome);
        linha.appendChild(colunaRemover);

        tabelaPokemons.appendChild(linha);

        document.getElementById("pokemon").value = "";
    } else{
        return alert("Quantidade máxima de Pokémons atingida.");
    }
}

function removerPokemon(linha){
    linha.remove();
}