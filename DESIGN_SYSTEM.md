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

_(nenhuma até 15/09/2026)_
