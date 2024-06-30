<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] != 2) {
    header("Location: login.php");
    exit();
}

require 'config.php';

// Récupérer les utilisateurs
$sql_users = "SELECT * FROM users";
$stmt_users = $pdo->query($sql_users);
$users = $stmt_users->fetchAll();

// Récupérer les articles
$sql_posts = "SELECT posts.*, users.username FROM posts JOIN users ON posts.author_id = users.id ORDER BY created_at DESC";
$stmt_posts = $pdo->query($sql_posts);
$posts = $stmt_posts->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Administration</h2>
        
        <div class="mb-4">
            <h3>Utilisateurs</h3>
            <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">
                <i class="fas fa-user-plus"></i>
            </button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo $user['grade'] == 2 ? 'Admin' : ($user['grade'] == 1 ? 'Membre' : 'Banni'); ?></td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editUserModal-<?php echo $user['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal-<?php echo $user['id']; ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <?php if ($user['grade'] == 0): ?>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#unbanUserModal-<?php echo $user['id']; ?>">
                                        <i class="fas fa-undo-alt"></i>
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#banUserModal-<?php echo $user['id']; ?>">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <!-- Modal Edit User -->
                        <div class="modal fade" id="editUserModal-<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel-<?php echo $user['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="edit_user.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel-<?php echo $user['id']; ?>">Modifier utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <div class="form-group">
                                                <label for="username">Nom d'utilisateur</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="grade">Grade</label>
                                                <select class="form-control" name="grade" required>
                                                    <option value="0" <?php if ($user['grade'] == 0) echo 'selected'; ?>>Banni</option>
                                                    <option value="1" <?php if ($user['grade'] == 1) echo 'selected'; ?>>Membre</option>
                                                    <option value="2" <?php if ($user['grade'] == 2) echo 'selected'; ?>>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete User -->
                        <div class="modal fade" id="deleteUserModal-<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel-<?php echo $user['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="delete_user.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteUserModalLabel-<?php echo $user['id']; ?>">Supprimer utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ban User -->
                        <div class="modal fade" id="banUserModal-<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="banUserModalLabel-<?php echo $user['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="ban_user.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="banUserModalLabel-<?php echo $user['id']; ?>">Bannir utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <p>Êtes-vous sûr de vouloir bannir cet utilisateur ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-warning">Bannir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Unban User -->
                        <div class="modal fade" id="unbanUserModal-<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="unbanUserModalLabel-<?php echo $user['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="unban_user.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="unbanUserModalLabel-<?php echo $user['id']; ?>">Débannir utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <p>Êtes-vous sûr de vouloir débannir cet utilisateur ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Débannir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mb-4">
            <h3>Articles</h3>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date de création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo htmlspecialchars($post['title']); ?></td>
                            <td><?php echo htmlspecialchars($post['username']); ?></td>
                            <td><?php echo $post['created_at']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editPostModal-<?php echo $post['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletePostModal-<?php echo $post['id']; ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Edit Post -->
                        <div class="modal fade" id="editPostModal-<?php echo $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel-<?php echo $post['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="edit_post.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPostModalLabel-<?php echo $post['id']; ?>">Modifier article</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                            <div class="form-group">
                                                <label for="title">Titre</label>
                                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Contenu</label>
                                                <textarea class="form-control" name="content" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete Post -->
                        <div class="modal fade" id="deletePostModal-<?php echo $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel-<?php echo $post['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="delete_post.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deletePostModalLabel-<?php echo $post['id']; ?>">Supprimer article</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                            <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="add_user.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <select class="form-control" name="grade" required>
                                <option value="0">Banni</option>
                                <option value="1">Membre</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
