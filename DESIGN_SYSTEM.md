# Design system do site Cruzeirista

> Extraído em 15/09/2026 do CSS e do HTML que estão no ar: `index.html`, `privacidade.html`, `termos.html` e as páginas de `destinos/` (padrão V3 em `america-do-sul.html`, padrão V2 em `caribe.html`).
> É a fonte para qualquer página nova do site. O que uma página precisar criar de novo entra na seção 12, marcado como adição, com o nome da página que criou.
> Não existe folha de estilo compartilhada: cada página carrega o próprio `<style>` inline. Este doc é o contrato entre elas.

---

## 1 · Fundamentos

| Item | Valor |
|---|---|
| Fonte | Geist (variável, 100 a 900), auto-hospedada em `fonts/Geist-VariableFont_wght.ttf` e `fonts/Geist-Italic-VariableFont_wght.ttf`, `font-display: swap`. Sem Google Fonts. |
| Reset | `*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0 }` |
| Suavização | `-webkit-font-smoothing: antialiased` no body |
| Rolagem | `html { scroll-behavior: smooth }` e `body { overflow-x: hidden }` em todas as páginas |
| Idioma | `<html lang="pt-BR">` |
| Favicon | `img/favicon.svg`, `img/favicon-32.png`, `img/apple-touch-icon.png` (180) em todas as páginas |

### Pesos usados
700 (títulos, nomes, números), 600 (rótulos, botões, subtítulos de card), 500 (links do menu, botões glass, texto de apoio), 400 (corpo). Nenhum outro.

---

## 2 · Cores

### Variáveis (`:root`, idênticas em todas as páginas)

| Variável | Valor | Uso |
|---|---|---|
| `--dark` | `#1a2535` | declarada, pouco usada |
| `--darker` | `#0f1822` | título em fundo claro, botão escuro, fundo de seção escura, nav rolada |
| `--white` | `#ffffff` | |
| `--gray` | `#6b7280` | corpo de texto em fundo claro, legendas |
| `--teal` | `#0891b2` | cor de ação: rótulos de seção, botão principal, links, foco de input |
| `--badge` | `#e05c2a` | só na home: erro de formulário e borda de input inválido |

Páginas legais acrescentam `--texto: #2b3440` (corpo longo) e `--linha: #e5e7eb`.

### Fundos fixos (sem variável, repetidos literalmente)

| Cor | Onde |
|---|---|
| `#050e1a` | loader e fundo do hero da home; base dos gradientes de overlay |
| `#0a1628` | body da home; rodapé das páginas internas |
| `#0f1822` | Quem Somos, hero das páginas legais, highlight strip, nav rolada |
| `#002860` | seção CTA final e rodapé da home; CTA das páginas de destino |
| `#f5f6f8` | seção do formulário; seção de portos |
| `#f8fafc` | fundo de `th` e do bloco de contato |
| `#ffffff` | seções de conteúdo |

### Tons derivados do teal
`#0780a0` (hover do `.btn-teal` e do `.btn-cta-main`), `#0e7490` (hover do `.btn-form-submit` e do `.btn-dest-cta`), `#0ac0e0` (hover de link teal em fundo escuro), `rgba(8,145,178,.92)` (badge sobre foto), `rgba(8,145,178,.22)` (brilho radial no hero legal).

### Tons derivados do escuro
`#0f2c5f` (hover dos botões escuros), `rgba(5,14,26,.x)` (overlays sobre foto).

### Cinzas de interface
`#e5e7eb` (bordas, divisores, barra de progresso vazia), `#d1d5db` (borda de input e chip, ponto de carrossel), `#9ca3af` (placeholder de input), `#f0f0ee` (borda de rodapé de card).

### Verde "sem visto" (só em `destinos/caribe.html`)
Rótulo `#16a34a` sobre `#f0fdf4` com borda `#bbf7d0`; badge `rgba(22,163,74,.92)`; texto de callout `#166534`.

### Azul informativo
Callout `.destaque` das páginas legais: fundo `#f0f9ff`, borda `#bae6fd`. Mesmo par no rótulo `.ships-group-label.visa`.

### Branco sobre escuro (opacidades canônicas)
`.90` texto principal e rótulo, `.82` tagline, `.72` e `.65` subtítulo, `.55` link de rodapé e corpo secundário, `.40` copyright, `.25` a `.12` linhas e vidro.

### WhatsApp
`#25D366`, único lugar onde entra.

---

## 3 · Tipografia

Tudo em Geist. As escalas abaixo são as que se repetem.

| Papel | Tamanho | Peso | Extras |
|---|---|---|---|
| Rótulo de seção (`.section-label`, `.routes-label`, `.ports-label`, `.cta-label`, `.legal-label`) | 11px | 600 | `letter-spacing: .22em`, uppercase, cor teal em fundo claro, branco `.90` ou `.5` em fundo escuro, `margin-bottom` 12 a 16px |
| Rótulo do hero da home | 12px | 600 | `.24em`, uppercase, branco `.55` |
| Título de seção grande (`.section-title`, `.tematicos-title`, `.cta-title`) | `clamp(28px, 4vw, 52px)` | 700 | `line-height: 1.15`, `letter-spacing: -.02em`, `max-width: 640px` |
| Título de seção médio (`.routes-title`, `.ports-title`) | `clamp(26px, 3vw, 40px)` | 700 | |
| Título do formulário (`.forms-copy-heading`) | `clamp(28px, 3.2vw, 44px)` | 700 | `line-height: 1.2` |
| Título de hero interno (`.dest-hero-title`) | `clamp(40px, 6vw, 80px)` | 700 | `line-height: 1.05`, `text-shadow: 0 2px 16px rgba(0,0,0,.3)` |
| Título de hero legal (`.legal-title`) | `clamp(34px, 5vw, 60px)` | 700 | `line-height: 1.05` |
| Título da home (`.hero-title .line1`) | `clamp(36px, 5.6vw, 86px)`; mobile `clamp(32px, 9vw, 56px)` | 700 | `line-height: 1.1`, `letter-spacing: .01em` |
| Subtítulo de hero | `clamp(15px, 1.6vw, 18px)` | 400 | branco `.82`, `max-width: 560px`, `line-height: 1.6` |
| Corpo de apoio (`.forms-copy-text`, `.cta-sub`, `.dest-cta-sub`) | 16px | 400 | `line-height: 1.6` a `1.75`, cinza ou branco `.55` a `.72` |
| Corpo longo (páginas legais) | 16px, 15px no mobile | 400 | `line-height: 1.7`, cor `--texto` |
| Subtítulo de página legal (`h2`) | `clamp(20px, 2.2vw, 26px)` | 700 | borda superior `--linha`, `margin: 44px 0 14px`, `padding-top: 28px` |
| Nome em card (`.ship-card-name`, `.port-card-name`) | 20px | 700 | `line-height: 1.2` |
| Nome em card pequeno (`.route-card-title`) | 18px | 700 | |
| Tag de card (`.ship-card-tag`) | 11px | 600 | `.14em`, uppercase, teal |
| Texto de card | 13px | 400 | `line-height: 1.5` a `1.6`, cinza |
| Link do menu | 13px | 500 | `.06em`, uppercase, branco `.80` |
| Rótulo de campo (`.form-group-label`) | 14px | 600 | `--darker` |
| Dica de campo (`.form-group-hint`) | 12px | 400 | cinza |
| Input, select, textarea | 14px | 400 | |
| Erro de formulário | 12px | 500 | `#e05c2a` |
| Número de destaque (`.highlight-number`) | 48px | 700 | teal, `line-height: 1` |
| Rodapé | 12px | 400 | branco `.55` links, `.40` copyright |

---

## 4 · Espaçamento e grade

### Largura de conteúdo
| Contexto | `max-width` |
|---|---|
| Grade de cards, cabeçalho de seção de cards | 1140px |
| Formulário e Quem Somos | 1100px |
| Texto corrido (legais) | 760px |
| Título de seção | 640px |
| Subtítulo centrado | 480 a 560px |
| Card do formulário | 540px |

### Padding de seção (desktop / até 900 / até 768 / até 480)
| Seção | Desktop | 900 | 768 | 480 |
|---|---|---|---|---|
| Seção padrão (Quem Somos, CTA) | `80px 48px` | `72px 24px` (QS) / `60px 24px` (CTA) | `56px 20px` | `44px 16px` |
| Formulário | `96px 24px` | | `56px 20px` | `44px 16px` |
| Seção de cards (`.routes-section`) | `72px 48px 96px` | | `44px 20px 64px` | |
| Portos | `88px 48px` | | | |
| CTA de destino | `88px 48px` | | `56px 24px` | |
| Corpo legal | `64px 48px 96px` | | `44px 20px 72px` | |
| Hero legal | `168px 48px 72px` | | `120px 24px 48px` | |
| Rodapé | `28px 48px` | | `24px 20px` | `20px 16px` |

Regra prática: margem lateral 48px no desktop, 24px em tablet, 20px no celular, 16px em celular pequeno.

### Gaps
Grade de cards 28px (route), 20px (port), 16px (temático). Pilares 40px. Colunas do formulário 72px, caindo para 40px. Botões lado a lado 12 a 14px. Chips 8px. Links do menu 32px. Links do rodapé 24px.

### Ritmo vertical dentro de seção
Rótulo 12 a 16px acima do título; título 16 a 24px acima do texto; texto 36 a 40px acima do botão; cabeçalho de grade 48 a 52px acima da grade.

---

## 5 · Raios, sombras e transições

| Elemento | Raio |
|---|---|
| Botão pill, chip, badge | `999px` ou `100px` |
| Input, select, textarea | `12px` |
| Callout, tabela, bloco de contato | `14px` |
| Card com foto (`.port-card`, `.dest-float-card`, `.tematico-card`) | `16px` |
| Card com borda (`.route-card`, `.ship-card`) | `18px` |
| Card do formulário, grid mobile do hero | `20px` a `24px` |

| Sombra | Valor |
|---|---|
| Card em repouso | `0 2px 16px rgba(0,0,0,.05)` |
| Card em hover | `0 12px 40px rgba(0,0,0,.10)` |
| Card do formulário | `0 8px 40px rgba(0,0,0,.06)` |
| Botão flutuante | `0 8px 24px rgba(0,0,0,.28)`, hover `0 12px 28px rgba(0,0,0,.32)` |

Transições: cor `.2s`, borda `.18s`, transform de botão `.15s` a `.25s` com `translateY(-1px)` ou `(-2px)` no hover, card `.3s` com `translateY(-6px)`, imagem de card `scale(1.04)` a `(1.06)` em `.5s`. Curva padrão `ease`; a única curva nomeada é `cubic-bezier(.23,1,.32,1)` (loader, WhatsApp, opacidade do hero).

---

## 6 · Botões

| Classe | Fundo | Texto | Padding | Fonte | Onde |
|---|---|---|---|---|---|
| `.btn` base | | | `11px 26px` | 13px / 500, `letter-spacing: .03em` | pill `999px`, sem borda |
| `.btn.btn-teal` | teal, hover `#0780a0` | branco | | | ação principal em fundo escuro |
| `.btn.btn-glass` | `rgba(255,255,255,.12)` + `blur(12px)`, borda `rgba(255,255,255,.18)`; hover `.22` | branco `.9` | | | ação secundária sobre foto ou fundo escuro |
| `.btn-cta-main` / `.btn-dest-cta` | teal, hover `#0780a0` / `#0e7490` | branco | `16px 36px` | 15px / 600 | CTA final das páginas internas, `translateY(-2px)` |
| `.btn-form-submit` | teal, hover `#0e7490` | branco | `14px 28px` | 15px / 600 | envio do formulário |
| `.btn-form-next` | `--darker`, hover `#0f2c5f` | branco | `14px 28px` | 15px / 600 | avançar etapa |
| `.btn-cta-sm` / `.btn-ship-cta` | `--darker`, hover `#0f2c5f` | branco | `9px 18px` / `10px 20px` | 13px / 600 | dentro de card, `white-space: nowrap` |
| `.form-back` | nenhum | cinza, hover `--darker` | | 14px / 500 | voltar etapa |
| `.dest-float-btn`, `.qs-pillar-cta`, `.legal-voltar` | nenhum | teal | | 11 a 14px / 600 | link de texto com seta |

No mobile (até 768) os botões do hero empilham em coluna com `width: 220px`.

---

## 7 · Cards e blocos

| Componente | Estrutura | Página de origem |
|---|---|---|
| `.route-card` | borda `#e5e7eb`, raio 18, cabeçalho 160px com gradiente `135deg #0f1822 → #0891b2` a `.88`, número de noites grande em branco `.12`, corpo com `.route-meta` (12px) e `.route-card-highlight` (13px), rodapé com borda `#f0f0ee`, texto "Consulte disponibilidade" e `.btn-cta-sm` | `destinos/*.html` V3 |
| `.ship-card` | mesma casca do route-card com foto 220px e `.ship-card-badge` no canto (teal `.92`, 12px/600, blur) | `destinos/caribe.html`, V2 |
| `.port-card` | foto 300px com overlay `transparent 35% → rgba(5,14,26,.80)`, tag teal `.85`, nome 20px, descrição 13px branco `.70` | `destinos/caribe.html` |
| `.dest-float-card` | branco `.95`, blur 20, raio 16, 196px de largura, foto + nome 13px/700 + tag 10px + link teal | home, desktop |
| `.dest-card` (grid mobile do hero) | vidro `rgba(5,14,26,.62)` + blur 14, borda branca `.12`, raio 20 | home, até 900 |
| `.qs-pillar` | borda superior branca `.12`, `padding-top: 28px`, título 16px/700 branco, texto 14px branco `.55` | home |
| `.forms-trust-item` | círculo teal 22px com check SVG + título 15px/500 + sub 13px cinza | home |
| `.destaque` | callout azul `#f0f9ff` / `#bae6fd`, raio 14, `padding: 16px 20px` | legais |
| `.semvisto-callout` | callout verde `#f0fdf4` / `#bbf7d0`, raio 14, `padding: 18px 24px`, ícone + texto 14px `#166534` | `destinos/caribe.html` |
| `.ships-group-divider` | linha `#e5e7eb` + pílula de rótulo 12px/700 `.12em` uppercase | `destinos/caribe.html` |
| `.highlight-strip` | fundo `--darker`, 4 colunas, número 48px teal + legenda 13px branco `.65` | `destinos/caribe.html` |
| `.tabela` | wrapper com `overflow-x: auto`, borda e raio 14, `th` uppercase 12px `.06em` em `#f8fafc` | legais |

---

## 8 · Formulário

Mecanismo: HTML estático + `fetch('cotacao.php', { method: 'POST', body: FormData })`. O PHP aceita `categoria, periodo, pessoas, experiencia, prioridades, nome, whatsapp, email, cidade`; exige `nome`, `whatsapp`, `cidade`; envia por e-mail para `contato@cruzeirista.com.br` com cópia para a One e grava JSON em `/home2/lippeo84/cotacoes/cotacoes.log`. Responde `{ok: true}` ou erro com status 422 ou 500. O botão vira "Enviando…" enquanto espera; erro reabilita o botão e mostra mensagem em `.form-error-msg`; sucesso esconde as etapas e mostra `.form-success`.

| Elemento | Estilo |
|---|---|
| `.forms-card` | branco, borda `#e5e7eb`, raio 24, `padding: 48px` (32/20 até 640, 28/16 até 480) |
| `.form-progress-seg` | 4px de altura, `#e5e7eb`; `.done` escuro, `.active` teal |
| `.form-step-label` | 11px/600 `.2em` uppercase teal |
| `.form-step-title` | `clamp(22px, 3vw, 30px)` / 700 |
| `.form-group` | `margin-bottom: 24px` |
| `.form-input`, `.form-select`, `.form-textarea` | borda `1.5px #d1d5db`, raio 12, `padding: 12px 16px`, 14px, foco teal, `appearance: none`; select recebe seta via `.form-select-wrap::after` |
| `.form-chip` | pill, borda `1.5px #d1d5db`, `padding: 8px 18px`, 13px/500; `.selected` fundo e borda `--darker`, texto branco |
| `.form-row` | duas colunas 16px de gap; uma coluna até 640 |
| `.form-divider` | `1px #e5e7eb`, `margin: 28px 0` |
| `.form-error-msg` | 12px/500 `#e05c2a`, `display: none` até `.visible` |
| `.form-success` | centrado, `h3` 22px/700, `p` 15px cinza |

Validação inline: campo vazio recebe `style.borderColor = '#e05c2a'` e a mensagem correspondente ganha `.visible`.

---

## 9 · Cabeçalho

Duas variantes, mesmo desenho: logo SVG inline centralizada (`.nav-brand`, 38px na home, 32px nas internas, 26px até 480), dois grupos `.nav-side` nas pontas, links 13px/500 uppercase `.06em` branco `.80`.

| | Home | Páginas internas |
|---|---|---|
| Posição | `absolute` dentro do hero, `z-index: 50` | `fixed`, `z-index: 100` |
| Fundo | transparente | gradiente `rgba(5,14,26,.72) → transparent` nas de destino; transparente nas legais |
| Ao rolar | não muda | `nav.scrolled` = `#0f1822` + blur 12, ativado por `window.scrollY > 60` |
| Padding | `28px 48px`, `20px 24px` até 900, `16px 20px` até 480 | `22px 48px`, `16px 20px` até 768 |
| Links | Quem Somos, Destinos · Temáticos, Faça uma cotação | Início, Destinos · Temáticos, Faça uma cotação (âncoras em `index.html#…`) |
| Mobile (até 768) | `.nav-side` some; aparece `.nav-mobile-btn` (hambúrguer) que alterna `nav.open`, mas não há CSS para `.open`: o menu não abre | `.nav-side` some; não há botão. Só a logo fica visível |

Fato registrado, não decisão: no celular o site não tem menu de navegação em nenhuma página.

---

## 10 · Rodapé

Logo SVG inline (`.ft-brand`, 26px, 22px no mobile, opacidade `.9`), links "Política de Privacidade" e "Termos de Uso" (12px branco `.55`), ícones Facebook e Instagram em círculos 32px (`rgba(255,255,255,.08)`), copyright 12px branco `.40`. Flex `space-between`; até 900 vira coluna centrada.

| | Home | Internas |
|---|---|---|
| Fundo | `#002860` | `#0a1628` com borda superior branca `.06` |

Duas cores de rodapé coexistem no site. Página nova escolhe uma e registra qual.

### WhatsApp flutuante
Bloco autocontido antes de `</body>` em todas as páginas: `.zap-flutuante`, `fixed`, `right: 24px; bottom: 24px`, pill `#25D366`, 14px/600, ícone 22px; até 768 `right: 16px; bottom: 16px`, 13px, ícone 20px. Link `https://wa.me/551140409598`. Na home recolhe no desktop enquanto os cards do hero estão na tela.

---

## 11 · Breakpoints

| Largura | O que muda |
|---|---|
| `900px` | grades viram 1 coluna (pilares, formulário), rodapé empilha, cards flutuantes do hero somem, nav da home aperta |
| `768px` | `.nav-side` some, paddings de seção caem para 56/20, título do hero da home muda de escala, botões do hero empilham, WhatsApp encolhe |
| `640px` | card do formulário aperta, `.form-row` vira 1 coluna |
| `560px` | carrossel de temáticos vira 58% por card |
| `480px` | paddings caem para 44/16, logo 26px, hero da home muda de escala de novo |

Ordem no CSS: regras base para desktop, depois `@media (max-width: …)` do maior para o menor. O site é escrito desktop-first; página nova pode ser escrita mobile-first desde que respeite os mesmos pontos de corte.

---

## 12 · Adições por página

> O que uma página precisou criar e não existia no sistema. Marcar com o nome da página e a data. Se outra página reaproveitar, a adição sobe para a seção correspondente acima.

### Landing Caribe sem visto (`caribe-sem-visto/index.html`, refeita em 16/09/2026 sobre o rascunho em PDF)

> Duas versões anteriores foram rejeitadas e substituídas inteiras: a de 15/09 (10 telas, copy v1) e a primeira de 16/09 (10 seções editoriais). Nenhum componente delas sobreviveu além do FAQ, da linha de privacidade e da seta do select. A composição agora segue `14_LANDING_CARIBE_SEM_VISTO/RASCUNHO Caribe-sem-visto-Landing.pdf`: hero, três cards, três ilhas, três passos, faixa do Panamá, FAQ curto, bloco azul, cadastro compacto, fecho tipográfico.

Escrita mobile-first (`@media (min-width: …)` em 481, 641, 769 e 901). Casca herdada: cabeçalho e rodapé (`#0a1628`, variante interna) de `privacidade.html`, formulário com o mesmo `cotacao.php`. Variáveis de atalho: `--azul: #002860`, `--claro: #f5f6f8`, `--acento: #7dd3e6` (teal clareado, só sobre fundo escuro). Rótulo, títulos e corpo seguem §3; o `.btn` da landing usa `14px 28px`, 14px/600 (entre o `.btn` base e o `.btn-cta-main` de §6). Os componentes abaixo foram criados nela.

| Adição | O que é | Derivado de |
|---|---|---|
| `.nav-brand-link` + `.nav-cta` + `.nav-mobile-btn` + `.nav-menu` | **Menu próprio da landing, não o do site.** Logo no canto esquerdo (link para a home), seguida das âncoras das seções (A viagem, Ilhas, Como funciona, Dúvidas). Direita: só `.nav-cta`, pill teal 12px/600 uppercase para o cadastro ("Site Cruzeirista" saiu em 16/09, bloco 01). Até 768 aparece um hambúrguer (40px, dois SVGs alternados: traços e X) que alterna `nav.open` e abre um painel `fixed` em `#0f1822` com as mesmas âncoras (15px/500, uppercase `.06em`, divisor branco `.08`) e "Quero conversar" em `--acento` | `.nav-mobile-btn` da home, completado |
| `.nav-cta` (na home) | Na `index.html`, o item "Caribe sem visto" do cabeçalho virou pill teal 13px/600 com ícone de nova aba (14px) e `target="_blank"`, apontando para `/caribe-sem-visto/` | `.btn-teal` reduzido |
| `.hero` + `.hero-fundo` | **Desde 23/09/2026: vídeo do navio, sem degradê** **Teste em avaliação (23/09): vídeo espelhado** (`.hero--espelho` no `<header>`, `transform: scaleX(-1)` nos `<video>`; o script usa a caixa do navio espelhada, x 37,7 a 63,2%), para o navio apontar para o lado oposto no mesmo lugar. Rollback: tirar a classe. **Botão "Explorar a viagem" do hero em `--amarelo` com texto `--darker`** (hover `#f3cc55`), igual ao "Quero falar com um especialista" do menu (Lippe, 23/09). **O "Quero conversar" de vidro saiu do hero** no mesmo dia (repetia o botão do menu); o hero fica com um botão só, e as regras `.btn-glass` saíram do CSS por não terem mais uso. (a versão anterior, com os dois clipes de Aruba e a vinheta azul-marinho, está no fim desta célula). Vídeo `videos/caribe-sem-visto/hero-navio.mp4`: navio de cruzeiro no mar, 8 s, escolhido por Lippe em `14_LANDING/ASSETS/` (original HEVC 10-bit 1948×1064); versão web em H.264 CRF 17, na mesma resolução, 6,3 MB, SSIM 0,991 contra o original (sem perda visível; o HEVC não toca em todo navegador). Pôster = primeiro quadro (`hero-navio.jpg`). Dois `<video>` com o mesmo arquivo: o script de sequência faz a fusão de 1,1 s de um para o outro no fim de cada volta, e o loop não pula. **Sem véu nem degradê sobre o vídeo** (pedido de Lippe: "remova completamente"); o texto fica fora do navio pelo enquadramento. **Enquadramento (JS "Hero: enquadramento"):** a caixa do navio no quadro foi medida no primeiro e no último frame (x 36,8 a 62,3%, y 43 a 56,7%). Desktop (≥ 769): o texto fica na coluna de 1140 (Lippe recusou o texto colado na margem esquerda); o vídeo é ancorado à esquerda e ampliado o mínimo para a popa ficar 48px à direita da linha de texto mais longa, medida pelas linhas reais (`Range.getClientRects`, a caixa do h1 ocupa a coluna inteira), com teto de 35% além do cover e sem deixar a proa passar da borda direita. Resultado: 1280 e 1440 com ~13 a 28% de ampliação, 1840 com 35% (o limite; a 1,35 o vídeo de 1948px ocupa 2484px CSS, ~1,3× de ampliação a 1x). Celular e tablet em pé (≤ 768): o vídeo vira uma faixa no alto (`--banda: clamp(340px, 46svh, 440px)`) com o navio inteiro a ~72% da largura, centrado na parte visível abaixo do menu, e o texto fica abaixo, sobre `#155a95`, o azul do mar do próprio vídeo na altura em que a faixa termina (medido nos frames; branco 7:1, amarelo 5:1). Tentativas descartadas no mesmo dia: vídeo em tela cheia no celular (o navio não cabe inteiro sem sobrepor o título), texto na margem de 48px no desktop (Lippe achou "colado na esquerda") e ampliação sem teto (cortava o navio). **Versão anterior (até 23/09):** `100svh` (até 860px no desktop). Fundo é **um vídeo de sangria total por vez**, em sequência: dois clipes de Aruba escolhidos por Lippe em 18/09 (`hero-aruba-aerea.mp4`, praia vista do alto, 14 s, e `hero-aruba-eagle.mp4`, Eagle Beach, 8,6 s; mp4 1600×900, CRF 26, 2,6 a 3,3 MB, `muted playsinline`, saturação +10%) empilhados; 1,1 s antes do fim, o próximo entra por fusão de opacidade e o anterior pausa, em loop pelos dois. O script da sequência foi reescrito em 18/09: não estava no arquivo commitado e o hero parava no último quadro. Só o primeiro tem `preload="auto"`; cada seguinte só baixa por inteiro quando o anterior começa a tocar. Só toca com o hero na tela, retoma ao voltar à aba e um vigia de 1,5 s religa se o navegador pausar. Lição de 16/09: em 960×540 com CRF 29 o hero ficou pixelado no desktop; vídeo de fundo em tela cheia pede ao menos 1600px de largura. Sem véu sobre o vídeo inteiro: o gradiente fica só onde o texto está (decisão de Lippe em 18/09). Desktop: vinheta linear da esquerda em azul-marinho `--azul` (rgba 0,40,96; .64 na borda, .44 a 38%, .24 a 48%, zero a 64% da largura), cor sugerida por Lippe para se misturar ao mar em vez do quase preto, sem máscara nem radial: a máscara vertical o Safari não respeitou e a elipse radial deixava uma borda visível na areia (18/09). A metade direita fica limpa. Celular: de baixo (.88, no mesmo azul) a zero em 60% da altura. Conferido nos dois clipes, inclusive no quadro de Eagle Beach em que o parágrafo cai sobre a areia clara. Título e texto do hero com sombra bem suave (duas camadas: 1px a 12 a 14% e 14 a 24px a 12 a 14%), pedida por Lippe depois de fechar a vinheta. H1 `clamp(50px, 14vw, 104px)` em duas linhas, "sem visto" em `--amarelo: #F7D66F` (amarelo do rascunho, aprovado em 16/09; só aqui), apoio de duas frases, dois botões (`.btn-teal` + `.btn-glass`). Sem selo e sem linha "americano" | hero do rascunho + `.dest-hero` |
| ~~`.hero--box`~~ (descartado) | **Teste de 23/09/2026 desfeito no mesmo dia a pedido de Lippe.** Vídeo reduzido a uma faixa e conteúdo num box branco na emenda com o ABC, a partir de uma referência de site de turismo. Saiu porque o vídeo em tela cheia vende melhor o destino e o box deixava a página com cara de tema pronto. O código do teste não está mais no arquivo; o hero é o da linha acima. Se voltar à mesa, o registro está no histórico desta conversa e no handoff | referência de Lippe |
| `.valor` + `.abc-titulo` + `.cards` + `.card` + `.card-foto` + `.card-texto` | Seção clara com foto ao fundo em 7% de opacidade. Título em duas linhas como no rascunho: "O ABC do Caribe" `clamp(40px, 4.6vw, 64px)`/700 em `--azul` e "de um jeito mais simples" a 70% do tamanho, peso 500. **Desde 23/09/2026, três cards com foto vertical e texto sobre a imagem** (substituíram os cards brancos com ícone, decisão de Lippe; copy mantida): raio 18, `overflow: hidden`, foto de sangria total (`object-fit: cover`, `object-position` por card no atributo `style`), degradê azul-marinho só no pé (`rgba(0,24,58)`: .92 na base, .80 a 26%, .42 a 48%, zero a 66%), título branco 21px no celular e `clamp(20px, 1.8vw, 23px)` no desktop, 700, `text-wrap: balance`, sombra de 1px; texto 15px a 88% de branco, até 34ch. Proporção 4:5 no celular (cards empilhados), 3:2 de 481 a 768 e 3:4 no desktop (três colunas). Hover só em dispositivo com mouse: card sobe 6px e a foto cresce 4% em .6s. Fotos (Unsplash, créditos em `img/caribe-sem-visto/CREDITS.txt`, 1000px de largura, JPEG 80): `abc-panama-cidade.jpg` (torre F&F na Cidade do Panamá; não é Colón nem o terminal), `abc-aruba.jpg` (praia de Aruba vista do alto, de `MÍDIAS/ARUBA`, escolhida por Lippe na tarde de 23/09 no lugar da praia Unsplash sem local; foto horizontal 16:9, recorte central com `object-position: 50% 50%`, que mostra hotéis, areia e mar) e `abc-varanda.jpg` (mulher na varanda de um navio ao pôr do sol, de `ASSETS/varandanavio.png`, escolhida por Lippe na tarde de 23/09 no lugar da foto Unsplash de duas mulheres ao notebook; quadrada, recorte com `object-position: 80% 50%` para manter a pessoa no quadro); os textos alternativos não atribuem lugar nem pessoa que a foto não mostra | cards do rascunho + pedido de Lippe (a referência visual citada por ele não chegou à sessão do Claude; o desenho segue a descrição: foto vertical, texto sobre a imagem) |
| `.rota` + `.rota-mapa` + `.rota-svg` + `.rota-cards` + `.rota-card` | **Rota no mapa + cards empilhados** (substituiu o cubo 3D, guardado em `14_LANDING_CARIBE_SEM_VISTO/RASCUNHOS/`). Seção branca com o título "Porto a porto, / ilha a ilha" em `.abc-titulo` (trocado em 16/09: "Seu Caribe começa com mais clareza" repetia "Caribe" do hero e do ABC) (os três passos ficavam logo abaixo até 23/09; agora vêm depois do atendimento). Grade `.9fr / 1.1fr`. À esquerda, um bloco `sticky` (`.rota-lado`, `top: 96px`) com o painel claro (fundo `#f5f6f8`, borda `#e5e7eb`, `min-height: 372px` no desktop com o mapa centrado, rótulo teal "2 opções de embarque", como na lâmina) com um SVG (viewBox 600×275) cuja terra foi **traçada do mapa da lâmina do fornecedor** (Panamá, costa da Colômbia e da Venezuela com Guajira e Paraguaná, lago de Maracaibo; contornos extraídos por cor com scikit-image e simplificados) em `rgba(15,24,34,.06)`, mais as três ilhas como elipses junto às paradas; posições das paradas medidas na lâmina. Linha de ida Colón → Cartagena → pela costa até Bonaire → Aruba → Curaçao em `--teal` com brilho leve (ordem conferida em 16/09 nos roteiros publicados pela companhia; a variante sem Bonaire existe e a legenda cobre isso), volta Curaçao → Colón em arco tracejado teal a 35% sobre o qual uma segunda linha teal se desenha depois do último card, paradas com halo teal (pulso de .6s ao acender), anel branco de borda cinza (teal quando feita, `--darker` quando ativa), rótulo 11.5px uppercase cinza (escuro quando feita ou ativa) e marcador de navio teal com borda branca. **A parada acende só quando o card correspondente chega ao seu lugar** (97% do trajeto), junto com o navio; a linha vai se desenhando no caminho. **Volta:** a folga depois do último card (`::after` de 60vh no desktop, 36vh no celular, com a pilha parada) é o trecho em que o navio percorre o arco de volta; ao chegar, Colón acende de novo no mapa, mas a leitura de bordo fica em Curaçao, com as coordenadas e o rumo de chegada a Curaçao e a rosa dos ventos parada (Lippe, 23/09/2026: antes ela trocava para Colón e ficava "Colón" ao lado do card de Curaçao). Os cards não voltam. Regra: na página branca, nenhum painel escuro; a paleta é a dos cards claros. À direita, cinco `<li>` brancos com borda `#e5e7eb`, `position: sticky; top: calc(96px + n × 48px)` e altura igualada por JS (o degrau é 8px menor que a barra de 56px: o card novo cobre o fim da barra do anterior, senão a esquina arredondada dele deixava ver um pedacinho do vídeo de trás); cada um com barra de topo de 56px em `#f5f6f8` que traz **só a bandeira do lugar, redonda (30px, anel branco), à esquerda** (decisão de 16/09: sem número, nome ou papel na barra; bandeiras desenhadas em SVG inline como composição redonda, viewBox 100×100 com clip circular e estrelas, faixas e bússola reposicionadas para caber inteiras no círculo; não recortar a bandeira retangular, que cortava as estrelas de Curaçao e Aruba, correção de 18/09), vídeo 16:10 (mp4 1280×720, CRF 21 a 24) e texto (h3 com o nome do lugar, dois parágrafos, mesmo padrão para portos e ilhas). Ao rolar, o card seguinte gruda um pouco abaixo do anterior, que fica visível só pela barra. A lista é `display: flex` em coluna (dentro de `grid`, o sticky ficava preso à própria linha e os últimos cards se amontoavam): cada card leva `margin-bottom` de (4 − n) degraus (48px no desktop, 44px no celular), compensada por `margin-top` negativa no seguinte, o que mantém o fluxo normal mas segura o degrau de cada um quando a lista acaba, e um `::after` de 24vh (10vh no celular) é a folga em que a pilha completa fica parada antes de subir inteira. **JS:** mede a posição natural de cada card (altura + margens, já que a posição lida de um sticky é a grudada); a fração de rolagem entre um card e o próximo desenha a linha (`stroke-dashoffset`) até a parada correspondente, move o navio (`getPointAtLength`) e acende a parada (`.feita`, `.ativa`); cada card chega com fade e subida de 28px nos últimos 360px antes de grudar, e nessa mesma janela o card anterior recua (`.recuado`), terminando no instante em que o novo gruda: o desfoque (`--desf` = t², até `backdrop-filter: blur(4px)` num `::after` sobre o conteúdo) cresce devagar e acelera no fim; o véu escuro (`--veu`, só nos últimos 45% da janela, com curva quadrática, até `rgba(15,24,34,.05)` no conteúdo e na barra, reduzido de .30/.20 em 18/09 a pedido do Lippe) entra só nos quadros finais. A barra também desfoca (mesmos 4px): depois que o card novo gruda, ela é a única parte visível do anterior, e sem isso o blur não aparecia. Ajustado em 16/09 depois de Lippe pedir escurecimento só no final e desfoque menor. Não usar `filter` nos filhos: vazava em retângulo fora do arredondado do card; abaixo do painel do mapa, a **leitura de bordo** (`.bordo`, só no desktop): nome da parada ativa em `--azul` 40px com entrada de .5s, coordenadas e rumo em fonte mono uppercase, e uma rosa dos ventos de 112px cuja carta gira para o rumo de chegada do navio (proa fixa no topo, agulha teal para o norte); só o vídeo do card ativo reproduz, todos pausam fora da tela. No celular a grade vira uma coluna, o mapa deixa de ser sticky, o papel some da barra e os cards empilham com `top: 72px + n × 44px` (barra de 52px) | lógica da referência enviada por Lippe (rota/pilares) e mapa da lâmina do fornecedor |
| `.passos` + `.passo` + `.passo-num` **Posição desde 23/09/2026: depois do bloco de atendimento ("Você não precisa planejar tudo sozinho") e antes do formulário**, decisão de Lippe; antes vinha logo abaixo da rota. Primeiro passo reescrito no mesmo dia: "Escolha da saída e da cabine" (o roteiro da landing já é definido, por isso saiu "Escolha do roteiro ideal"), com quebra própria: `.passo-quebra` (span vazio, `display: block` só a partir de 769) faz "Escolha / da saída / e da cabine" no desktop, onde "Escolha da saída" não cabe na coluna, e "Escolha da saída / e da cabine" no celular. | Seção branca, três colunas abertas alinhadas à esquerda, como no rascunho (ajustado em 18/09 para bater com a imagem de referência): número gigante `#e9eaec` (150px no celular, 220 a 250px no desktop) encostado à esquerda e atrás do bloco de texto, que começa 34 a 52px para dentro e 46 a 70px abaixo do topo do número; título em duas linhas com `<br>` (30px no celular, 30 a 42px no desktop, 700, `#2b5f86`); texto 17 a 20px, `#4b5563`, linha 1.45, até 30ch; textos do rascunho. **Entrada em sequência:** com `html.js`, cada `.passo` parte de opacidade 0 e 14px abaixo e entra em .3s com `cubic-bezier(.23,1,.32,1)`, atrasos 0/80/160ms, disparado uma vez quando 25% da seção aparece; com movimento reduzido só o fade de .2s; sem JS tudo fica visível | passos numerados do rascunho |
| `.panama` + `.panama-banner` + `.panama-corpo` + `.panama-copa` | **Ambiente do Panamá (bloco 02, primeiro build de 18/09).** Banner que mostra o vídeo inteiro, sem corte (Lippe reclamou do `cover` em altura fixa): no desktop o banner tem `aspect-ratio: 16/9` e o texto sobrepõe à esquerda; no celular o texto fica num bloco acima do quadro 16:9. Vídeo editado por Lippe em 18/09 (`panama-banner.mp4`: portão de embarque, avião decolando e sobrevoo da Cidade do Panamá; mp4 1600×900 CRF 26, 30 s, 5 MB, sem áudio, toca só na tela, pôster com movimento reduzido; substituiu o clipe da placa "Panama City"), sem `object-position` porque não há corte; contraste só onde o texto está (gradiente à esquerda no desktop, em cima no celular), sem rótulo (o "Panamá" pequeno em `--amarelo` acima do título saiu em 23/09 a pedido de Lippe, porque repetia a palavra do título; a regra `.panama-banner .rotulo` saiu junto), título `clamp(32px, 7.4vw, 56px)` e uma linha de apoio. Corpo em `--azul`: título "Stopover no Panamá, / a viagem antes da viagem" (h3 branco, 26 a 37px em duas linhas; Lippe pediu "stopover" para dialogar com o Panamá e a Copa; a linha Brasil → Cidade do Panamá → Colón → Antilhas saiu a pedido de Lippe em 18/09), dois parágrafos (desde 23/09/2026 com pontos-chave em `<strong>` 600 e branco pleno, pedido de Lippe: Cidade do Panamá, Colón abre o caminho marítimo para as Antilhas, um lugar que merece tempo na viagem, chegar antes ou ficar depois do cruzeiro, Canal, Casco Antiguo; regra `.panama-copy strong`) e três quadros dos vídeos da pasta MÍDIAS (cidade 16:9 grande, orla e Canal em 4:3) com legenda uppercase. Faixa branca da Copa abaixo, subordinada: logo oficial positiva 38 a 44px, uma frase e foto CC0 do avião em Tocumen em 280px. Sem menção a transporte incluído nem a travessia do Canal | seção Panamá do bloco 02 |
| `.royal-drink-3d` + `model-viewer#seapass-3d` | **Teste (18/09):** na seção do pacote de bebidas, agora com fundo branco e texto sem o bloco amarelo (Lippe, 18/09), o cartão SeaPass em 3D flutuando direto sobre o branco, sem painel de fundo (Lippe tirou o azul em 18/09) (glb em `models/caribe-sem-visto/`) via `@google/model-viewer` 4.1 (CDN jsdelivr, módulo carregado no fim da página). Cartão deitado, câmera a 0,2 m com fov 24° e leve inclinação (phi 80°); a rolagem gira a órbita quatro voltas (−720° a 720°) enquanto a seção atravessa a tela (progresso 0 ao entrar por baixo, 1 ao sair por cima), de frente no meio; Lippe pediu giro bem mais rápido que a rolagem. `touch-action: pan-y`, sem zoom, sem arrasto. Hover: o mouse acima ou abaixo do centro do palco inclina o cartão até 7° para cima ou para baixo (ângulo polar 80° ± 7°), com amortecimento de 8% por quadro, e volta ao centro ao sair. Sombra do renderizador desligada (girava junto e ficou estranha); no lugar, uma elipse parada em CSS sob o cartão (`::after` do palco, 46% de largura, radial azul-marinho a 22%, desfoque 2px). Flutuação: o `model-viewer` sobe e desce 8px num ciclo de 6 s (`ease-in-out`, infinito). Balanço automático: a inclinação oscila ±3° num ciclo de 7 s e o giro ganha um vai e vem de ±2° num ciclo de 11 s (senoides em `requestAnimationFrame`, só com a seção na tela), somados ao scroll e ao hover. Tudo desligado com movimento reduzido. Com movimento reduzido fica parado a −18°. Selo "Incluído em saídas participantes" removido | referência enviada por Lippe (cartão que gira com a rolagem) |
| `.faq` / `.faq-item` | Acordeão nativo `<details>`/`<summary>` (Lippe pediu retrátil em 18/09, depois de um build com blocos abertos): fundo da seção `--claro`, cartões brancos raio 16, pergunta 19 a 22px/700 em `#2b5f86` clicável, ícone redondo de 30px com "+" que gira para "×" ao abrir, resposta 16 a 17px `#4b5563`, largura 800. Todas fechadas de início. As seis perguntas e respostas aprovadas por Lippe (a sexta, sobre para quem o roteiro faz sentido, entrou em 18/09 com texto dele), nada além delas | FAQ do rascunho |
| `.confianca` + `.confianca-foto` + `.confianca-selo` + `.checks` | Bloco `--azul` com presença (padding 104px no desktop), grade .9/1.1 com 72px de vão: foto de pessoa em atendimento (desde 23/09/2026, a mulher ao telefone diante de um mapa-múndi, escolhida por Lippe em `ASSETS/`; vertical, recortada no quadro 1:1 do celular e 10:9 do desktop com `object-position: 50% 86%` (Lippe pediu para o barquinho da mesa aparecer; o topo da cabeça fica perto da borda de cima); crédito em CREDITS) com selo amarelo `--amarelo` sobreposto à borda direita ("Fale com um / Especialista Cruzeirista", as duas linhas em 18px alinhadas à esquerda, raio 14, sombra), título `clamp(32px, 6.8vw, 50px)`, parágrafo 19px a 86%, dois benefícios com marcadores redondos amarelos e check escuro. Copy fechada por Lippe em 18/09; sem "atendimento humano", suporte na viagem ou guia digital | bloco azul do rascunho |
| `.cadastro-card` + `.cadastro-copy` + `.cadastro-form` | Cartão de raio 32 e largura 1160, dividido .42/.58: painel `--azul` com título `clamp(28px, 4.4vw, 40px)` e texto 17px; campos Nome, WhatsApp, E-mail e Previsão da viagem ("Ainda não decidi" primeiro), rótulos uppercase 14px/700, inputs cinza `#eef0f2` sem borda, raio 8; botão retangular `--azul` largo e uppercase "Quero receber minhas opções"; nota de privacidade e caixa de sucesso mantidas. "Cidade de partida" saiu em 18/09 (o cotacao.php ainda exige cidade: ajustar na publicação) | formulário do rascunho |
| `.fecho` + `.btn-amarelo` | Título uppercase `clamp(34px, 7vw, 70px)` em `#333`, parágrafo `clamp(17px, 1.8vw, 24px)`, padding 136/152px no desktop e botão amarelo `--amarelo` largo (pill, 30×96px, 21px uppercase, seta) apontando para `#contato` | fecho do rascunho |
| `.zap-flutuante` (variante da landing) | Até 768 vira círculo de 56px só com o ícone (rótulo escondido para leitores de tela); em qualquer largura ganha `.zap-oculto` (some) enquanto o formulário, o fecho ou o rodapé estão na tela, por `IntersectionObserver` | `.zap-flutuante` de §10 |
| `.rv` / `.rv-2` / `.rv-3` | Reveal ao rolar: opacidade 0 + 16px, `.6s cubic-bezier(.23,1,.32,1)`, atrasos de 80 e 160ms, uma vez, `IntersectionObserver` com threshold 0 e `rootMargin` −8%. Desligado em `prefers-reduced-motion` | curva do loader da home |

Fatos registrados, não decisões: a landing chama `../cotacao.php` com `categoria=caribe`; o PHP exige `cidade`, por isso o campo "Cidade de partida" permanece no formulário compacto; "Previsão da viagem" vazia envia "ainda não decidi"; as fotos de navio tiveram o nome no casco apagado e a do hero está espelhada (ver `img/caribe-sem-visto/CREDITS.txt`), porque a página não crava navio.
