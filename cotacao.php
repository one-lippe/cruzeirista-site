<?php
/* ============================================================
   Cruzeirista — recebimento dos pedidos de cotação do site
   Envia cada pedido por e-mail para o destinatário abaixo.
   Hospedagem: HostGator (PHP + mail() nativo). Mesmo padrão do
   enviar.php da página em construção, que já entregava.
   ============================================================ */
// Destino principal: caixa do Cruzeirista (Titan). A One recebe em cópia.
// 09/09/2026: o remetente no-reply@ foi posto na lista de permissões do Titan; enquanto o SPF/DKIM
// do domínio não incluir a HostGator (DNS no Registro.br), sem isso o e-mail cai em spam.
$DESTINO = 'contato@cruzeirista.com.br';
$COPIA   = 'lippe@onepublicidadecriativa.com';

header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); echo json_encode(['ok' => false, 'error' => 'metodo_invalido']); exit;
}
function limpa($v) { return trim(filter_var($v ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); }

$categoria   = limpa($_POST['categoria']   ?? '');
$periodo     = limpa($_POST['periodo']     ?? '');
$pessoas     = limpa($_POST['pessoas']     ?? '');
$experiencia = limpa($_POST['experiencia'] ?? '');
$prioridades = limpa($_POST['prioridades'] ?? '');
$nome        = limpa($_POST['nome']        ?? '');
$whatsapp    = limpa($_POST['whatsapp']    ?? '');
$email       = trim($_POST['email']        ?? '');
$cidade      = limpa($_POST['cidade']      ?? '');

if ($nome === '' || $whatsapp === '' || $cidade === '') {
    http_response_code(422); echo json_encode(['ok' => false, 'error' => 'campos_obrigatorios']); exit;
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) { $email = ''; }

$rotulos = [
    'caribe' => 'Caribe sem visto', 'brasil' => 'Cruzeiros no Brasil', 'internacional' => 'Internacional',
    'tematico' => 'Temático / show', 'naosei' => 'Ainda não sei',
    'primeira' => 'Primeira vez', 'antes' => 'Já embarquei antes', 'varias' => 'Várias vezes',
    'preco' => 'Preço justo', 'conforto' => 'Conforto', 'roteiro' => 'Roteiro', 'festa' => 'Festa / energia a bordo',
    'familia' => 'Bom pra família', 'romantico' => 'Romântico',
];
$rot = function ($v) use ($rotulos) {
    $partes = array_filter(array_map('trim', explode(',', $v)));
    if (!$partes) { return '(não informado)'; }
    $out = [];
    foreach ($partes as $x) { $out[] = isset($rotulos[$x]) ? $rotulos[$x] : $x; }
    return implode(', ', $out);
};
$ou = function ($v) { return $v !== '' ? $v : '(não informado)'; };

$assunto = 'Nova cotação - Cruzeirista - ' . $nome;
$corpo  = "Novo pedido de cotação recebido pelo site do Cruzeirista:\n\n";
$corpo .= "Nome...........: " . $nome . "\n";
$corpo .= "WhatsApp.......: " . $whatsapp . "\n";
$corpo .= "E-mail.........: " . $ou($email) . "\n";
$corpo .= "Cidade.........: " . $cidade . "\n\n";
$corpo .= "Tipo de cruzeiro: " . $rot($categoria) . "\n";
$corpo .= "Quando.........: " . $ou($periodo) . "\n";
$corpo .= "Pessoas........: " . $ou($pessoas) . "\n";
$corpo .= "Experiência....: " . $rot($experiencia) . "\n";
$corpo .= "Prioridades....: " . $rot($prioridades) . "\n";
$corpo .= "\n---\n";
$corpo .= "Data/hora: " . date('d/m/Y H:i:s') . "\n";
$corpo .= "IP.......: " . ($_SERVER['REMOTE_ADDR'] ?? '-') . "\n";
$corpo .= "Navegador: " . substr($_SERVER['HTTP_USER_AGENT'] ?? '-', 0, 200) . "\n";

$headers  = "From: Cruzeirista Site <no-reply@cruzeirista.com.br>\r\n";
$headers .= "Cc: " . $COPIA . "\r\n";
if ($email !== '') { $headers .= "Reply-To: " . $email . "\r\n"; }
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Registro em arquivo fora do public_html: nenhum pedido se perde se o e-mail falhar.
// Ler no cPanel > Gerenciador de Arquivos > /home2/lippeo84/cotacoes/cotacoes.log
$registro = json_encode([
    'data' => date('c'), 'nome' => $nome, 'whatsapp' => $whatsapp, 'email' => $email, 'cidade' => $cidade,
    'categoria' => $categoria, 'periodo' => $periodo, 'pessoas' => $pessoas, 'experiencia' => $experiencia,
    'prioridades' => $prioridades, 'ip' => $_SERVER['REMOTE_ADDR'] ?? '-',
], JSON_UNESCAPED_UNICODE);
@file_put_contents(dirname(__DIR__) . '/cotacoes/cotacoes.log', $registro . "\n", FILE_APPEND | LOCK_EX);

$enviado = @mail($DESTINO, $assunto, $corpo, $headers);
if ($enviado) { echo json_encode(['ok' => true]); }
else { http_response_code(500); echo json_encode(['ok' => false, 'error' => 'falha_envio']); }
