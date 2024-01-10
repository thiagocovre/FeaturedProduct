## Considerações

- Módulo foi desenvolvido da forma mais simples possível, dentro do tempo determinado.
- Alguns itens poderiam ser melhorados com mais tempo, como por exemplo: inserção de carrossel, melhoria de design e etc.
- A implementação de um módulo completo com todas as funcionalidades solicitadas como por exemplo um CRUD para gestão demoraria mais tempo
- A possibilidade de configuração por visão de loja e outros recursos demandam mais tempo
- Os testes unitários necessários levariam um tempo considerável para desenvolvimento
- Possível saída de API e GraphQl para front separado do magento poderia ser desenvolvido

## Ativação

- Clone o repositório no seu local, no caminho app/code/Vendor/CustomFeaturedProduct
- Execute os comandos do magento necessários para ativação, compilação e geração de estáticos

## Lógica do Módulo

Módulo foi desenvolvido da forma mais simples possível, dentro do tempo determinado.

De forma resumida, criei um atributo já na instalação do módulo e colocado dentro do grupo default, para determinar o produto que será destaque. Através dele, executei funções para recuperar os dados necessários e solicitados do produto, assim como a exibição no local pedido.


## Configuração
Após a instalação, você precisará configurar o produto em destaque:

Faça login no painel de administração do Magento.

Navegue até o Catálogo > Produtos.

Selecione o produto que deseja destacar.

Você encontrará um novo atributo chamado "Produto em Destaque". Marque a opção "Sim" para destacar o produto.

Salve as alterações.


## Uso
Após a instalação e configuração, a homepage do seu Magento 2 exibirá um elemento de destaque com as informações do produto configurado como destaque. Esse elemento será atualizado dinamicamente para refletir o estoque disponível em tempo real.
