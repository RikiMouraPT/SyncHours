# SyncHours 🕒

<div align="center">
  <img src="/public/assets/logo.png" alt="SyncHours Logo">
  <br>
  <p><i>Sistema de gestão e monitorização de horas de trabalho</i></p>
</div>

## 📋 Visão Geral

SyncHours é uma aplicação web desenvolvida com Laravel para monitorizar e gerir o tempo dedicado a alunos universitários para que possam reduzir os níveis de stress e focar-se no que realmente importa. Esta ferramenta permite o registo de horas de estudo, horas de sono e marcação de exames, categorização de atividades, utiliza também a API do Gemini para funcionalidades avançadas de análise e processamento de dados.

### Funcionalidades Principais

- ✅ **Registo de Atividades**: Controlo de início e fim de tarefas
- 🔄 **Configurações Personalizáveis**: Adapte a aplicação às suas necessidades
- 📊 **Análise de Dados**: Visualize estatísticas sobre a utilização do seu tempo
- 🤖 **Integração com IA**: Utilize o poder do Gemini para criar um plano de estudo
- 📱 **Design Responsivo**: Interface adaptável a diferentes dispositivos

## 🚀 Instalação

### Requisitos Prévios

- [PHP](https://www.php.net/) (v8.0 ou superior)
- [Laravel](https://laravel.com/docs/12.x)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/)
- Chave de API do Gemini

### Instruções de Instalação

1. **Clone o repositório**

```bash
git clone https://github.com/RikiMouraPT/SyncHours.git
cd SyncHours
```

2. **Instale as dependências PHP**

```bash
composer install
```

3. **Instale as dependências JavaScript**

```bash
npm install
```

4. **Configure o ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

7. **Compile os assets**

```bash
npm run dev
```

8. **Inicie o servidor de desenvolvimento**

```bash
php artisan serve
```

A aplicação estará disponível em `http://localhost:8000`

## 💻 Como Utilizar

### Funcionalidades Principais

2. **Dashboard Principal**: Visualize as suas atividades semanais
3. **Registo de Horas**: Adicione novas entradas especificando projeto, descrição e tempo
5. **Análises com IA**: Permita que IA faça a gestão do seu tempo de estudo
6. **Configurações**: Personalize o sistema conforme as suas necessidades

### Rotas Principais

- `/`: Página inicial/Dashboard
- `/user`: Página de visualização das configurações do utilizador
- `/user/create`: Formulário para alteração de configuração

## 🛠️ Estrutura do Projeto

```
SyncHours/
├── app/                 # Lógica principal da aplicação
│   ├── Http/            # Controllers, Middleware, Requests
│   ├── Models/          # Models da base de dados
│   └── Providers/       # Service providers
├── resources/           # Views, assets não compilados
│   └── views/           # Templates Blade
├── routes/              # Definições de rotas
│   ├── web.php          # Rotas web
│   └── console.php      # Comandos personalizados
```

### Arquitetura MVC

O SyncHours segue a arquitetura Model-View-Controller (MVC) do Laravel:
- **Models**: Definem a estrutura de dados e interação com a base de dados
- **Views**: Templates Blade para renderização da interface
- **Controllers**: Processam as requisições e coordenam a lógica da aplicação

### Integração com Gemini

A aplicação utiliza a API do Gemini para fornecer:
- Sugestões de otimização de produtividade
- Classificação automática de atividades


### Configuração da API do Gemini

Para utilizar as funcionalidades de IA do Gemini, certifique-se de:
1. Obter uma chave de API válida em [https://aistudio.google.com](https://aistudio.google.com/u/1/prompts/new_chat)
2. Adicionar a chave ao seu ficheiro `.env`
3. Configurar os parâmetros de utilização no painel de administração

### Compilação de Assets

```bash
# Desenvolvimento
npm run dev

# Compilar para produção
npm run build

# Compilar com hot reload
npm run hot
```

## 📚 Stack Tecnológica

- **Laravel**: Framework PHP para backend
- **Blade**: Sistema de templates
- **Vite**: Compilação de assets front-end
- **Gemini API**: Funcionalidades de inteligência artificial e análise de dados

## 📄 Licença

Este projeto está licenciado sob a Licença MIT - veja o ficheiro LICENSE para detalhes.

## 📞 Suporte

Se encontrar algum problema ou tiver questões, por favor [abra uma issue](https://github.com/RikiMouraPT/SyncHours/issues) no repositório GitHub.

---

<div align="center">
  <p>Desenvolvido com ❤️ por TechVinci</p>
</div>
