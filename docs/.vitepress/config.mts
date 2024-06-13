import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  head: [['link', { rel: 'icon', href: 'assets/favicon.svg' }]],
  title: "API FFLCH",
  description: "API FFLCH",
  cleanUrls: true,
  base: '/docs/',
  themeConfig: {
    logo: 'assets/favicon.svg',
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: '/' },
      { text: 'Sobre', link: '/sobre' },
      { text: 'Autenticação', link: '/autenticacao' },
      { text: 'Endpoints', link: '/endpoints' },
    ],

    sidebar: [
      {
        text: 'Autenticação',
        items: [
          { text: 'Convite', link: 'autenticacao/convite' },
          { text: 'Cadastro', link: 'autenticacao/cadastro' },
          { text: 'Consultas Autenticadas', link: 'autenticacao/consultas-autenticadas' },
          { text: 'Novo Token', link: 'autenticacao/novo-token' },
        ]
      },

        {
        text: 'Endpoints',
        items: [
          {
            text: 'Graduação',
            collapsed: true,
            items: [
              { text: 'Graduações', link: 'endpoints/graduacao/graduacoes' },
              { text: 'Disciplinas', link: 'endpoints/graduacao/disciplinas' },
            ]
          },
          {
            text: 'Iniciação Científica',
            collapsed: true,
            items: [
              { text: 'Projetos', link: 'endpoints/iniciacao-cientifica/projetos' },
              { text: 'Trabalhos SIICUSP', link: 'endpoints/iniciacao-cientifica/siicusp-trabalhos' },
            ]
          },
          {
            text: 'Pós-Graduação',
            collapsed: true,
            items: [
              { text: 'Pós-Graduações', link: 'endpoints/posgraduacao/posgraduacoes' },
              { text: 'Disciplinas', link: 'endpoints/posgraduacao/disciplinas' },
            ]
          },
          {
            text: 'Pesquisas Avançadas',
            collapsed: true,
            items: [
              { text: 'Pós-Doutorados', link: 'endpoints/pesquisas-avancadas/posdocs' },
              { text: 'Pesq. Colaboradores', link: 'endpoints/pesquisas-avancadas/pesquisadores-colaboradores' },
            ]
          },
          {
            text: 'Servidores',
            collapsed: true,
            items: [
              { text: 'Docentes', link: 'endpoints/servidores/docentes' },
              { text: 'Funcionários', link: 'endpoints/servidores/funcionarios' },
              { text: 'Estagiários', link: 'endpoints/servidores/estagiarios' },
            ]
          },
          {
            text: 'Cultura e Extensão',
            collapsed: true,
            items: [
              { text: 'Cursos', link: 'endpoints/ccex/cursos' },
            ]
          },
        ]
      },
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/fflch' }
    ],
  },
})
