$(document).ready(function () {
    $('.edit-button').on('click', function() {
        var $task = $(this).closest('.task');
        $task.find('.progress').addClass('hidden');
        $task.find('.task-description').addClass('hidden');
        $task.find('.task-actions').addClass('hidden');
        $task.find('.edit-task').removeClass('hidden');
    });

    $('.progress').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).addClass('done');
        } else {
            $(this).removeClass('done');
        }
    });
        
        const id = $(this).data('task-id');
        const completed = $(this).is(':checked') ? 'true' : 'false';
        $.ajax({
            url: '../../actions/update-progress.php',
            method: 'POST',
            data: {id: id, completed: completed},
            dataType: 'json', 
            error: function (response) {
                if (response.success) {
                } else {
                    alert('Tarefa realizada com sucesso         .');
                }
            },
            success: function() {
                alert('Error na tarefa.');
            }
        });
    });




    
