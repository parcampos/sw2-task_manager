<?php require 'header.php'; ?>

<h2>Minhas Tarefas</h2>
<a href="logout.php">Logout</a>
<form action="tarefas.php" method="post">
    <input type="hidden" name="action" value="create">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>
    <br>
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required></textarea>
    <br>
    <label for="dataVencimento">Data de Vencimento:</label>
    <input type="date" name="dataVencimento" id="dataVencimento" required>
    <br>
    <label for="prioridade">Prioridade:</label>
    <select name="prioridade" id="prioridade">
        <option value="Alta">Alta</option>
        <option value="Média">Média</option>
        <option value="Baixa">Baixa</option>
    </select>
    <br>
    <input type="submit" value="Adicionar Tarefa">
</form>

<h3>Lista de Tarefas</h3>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data de Criação</th>
            <th>Data de Vencimento</th>
            <th>Prioridade</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tarefas as $t): ?>
        <tr>
            <td><?php echo htmlspecialchars($t['Titulo']); ?></td>
            <td><?php echo htmlspecialchars($t['Descricao']); ?></td>
            <td><?php echo htmlspecialchars($t['DataCriacao']); ?></td>
            <td><?php echo htmlspecialchars($t['DataVencimento']); ?></td>
            <td><?php echo htmlspecialchars($t['Prioridade']); ?></td>
            <td><?php echo htmlspecialchars($t['Status']); ?></td>
            <td>
                <form action="tarefas.php" method="post" style="display:inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="tarefaID" value="<?php echo $t['TarefaID']; ?>">
                    <select name="status">
                        <option value="Pendente" <?php if ($t['Status'] == 'Pendente') echo 'selected'; ?>>Pendente</option>
                        <option value="Concluída" <?php if ($t['Status'] == 'Concluída') echo 'selected'; ?>>Concluída</option>
                    </select>
                    <input type="date" name="dataVencimento" value="<?php echo htmlspecialchars($t['DataVencimento']); ?>">
                    <input type="submit" value="Atualizar">
                </form>
                <form action="tarefas.php" method="post" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="tarefaID" value="<?php echo $t['TarefaID']; ?>">
                    <input type="submit" value="Excluir">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>
