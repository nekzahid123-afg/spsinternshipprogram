const taskForm = document.getElementById("task-form");
const taskIdInput = document.getElementById("task-id");
const titleInput = document.getElementById("task-title");
const descriptionInput = document.getElementById("task-description");
const priorityInput = document.getElementById("task-priority");
const tagInput = document.getElementById("task-tag");
const dateInput = document.getElementById("task-date");
const formHeading = document.getElementById("form-heading");
const submitButton = document.getElementById("submit-button");
const cancelButton = document.getElementById("cancel-button");
const taskTemplate = document.getElementById("task-template");

const taskLists = {
    todo: document.getElementById("todo-list"),
    progress: document.getElementById("progress-list"),
    completed: document.getElementById("completed-list")
};

let tasks = [];
let draggedTaskId = null;

taskForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const taskDetails = {
        title: titleInput.value.trim(),
        description: descriptionInput.value.trim(),
        priority: priorityInput.value,
        tag: tagInput.value.trim(),
        dueDate: dateInput.value
    };

    if (taskIdInput.value) {
        updateTask(taskIdInput.value, taskDetails);
    } else {
        addTask(taskDetails);
    }

    resetForm();
});

cancelButton.addEventListener("click", resetForm);

function addTask(taskDetails) {
    const newTask = {
        id: Date.now().toString(),
        status: "todo",
        completed: false,
        ...taskDetails
    };

    tasks.push(newTask);
    renderTasks();
}

function updateTask(taskId, taskDetails) {
    const task = getTask(taskId);

    if (task) {
        Object.assign(task, taskDetails);
        renderTasks();
    }
}

function removeTask(taskId) {
    const shouldDelete = confirm("Do you want to delete this task?");

    if (shouldDelete) {
        tasks = tasks.filter(function (task) {
            return task.id !== taskId;
        });
        renderTasks();
    }
}

function editTask(taskId) {
    const task = getTask(taskId);

    if (!task) {
        return;
    }

    taskIdInput.value = task.id;
    titleInput.value = task.title;
    descriptionInput.value = task.description;
    priorityInput.value = task.priority;
    tagInput.value = task.tag;
    dateInput.value = task.dueDate;

    formHeading.textContent = "Edit task";
    submitButton.textContent = "Save changes";
    cancelButton.hidden = false;
    titleInput.focus();
    window.scrollTo({ top: 0, behavior: "smooth" });
}

function resetForm() {
    taskForm.reset();
    taskIdInput.value = "";
    formHeading.textContent = "Add a new task";
    submitButton.textContent = "Add task";
    cancelButton.hidden = true;
}

function toggleCompleted(taskId) {
    const task = getTask(taskId);

    if (!task) {
        return;
    }

    task.completed = !task.completed;
    task.status = task.completed ? "completed" : "todo";
    renderTasks();
}

function getTask(taskId) {
    return tasks.find(function (task) {
        return task.id === taskId;
    });
}

function renderTasks() {
    Object.values(taskLists).forEach(function (taskList) {
        taskList.innerHTML = "";
    });

    tasks.forEach(function (task) {
        const card = createTaskCard(task);
        taskLists[task.status].appendChild(card);
    });

    updateTaskCounts();
}

function createTaskCard(task) {
    const card = taskTemplate.content.cloneNode(true).querySelector(".task-card");
    const checkbox = card.querySelector(".complete-checkbox");
    const priority = card.querySelector(".priority-tag");
    const tag = card.querySelector(".category-tag");
    const dueDate = card.querySelector(".due-date");

    card.dataset.id = task.id;
    card.classList.toggle("completed", task.completed);
    card.querySelector(".card-title").textContent = task.title;
    card.querySelector(".card-description").textContent = task.description;

    priority.textContent = task.priority;
    priority.classList.add(task.priority.toLowerCase());
    tag.textContent = task.tag;
    dueDate.textContent = formatDate(task.dueDate);
    checkbox.checked = task.completed;

    checkbox.addEventListener("change", function () {
        toggleCompleted(task.id);
    });

    card.querySelector(".edit-button").addEventListener("click", function () {
        editTask(task.id);
    });

    card.querySelector(".delete-button").addEventListener("click", function () {
        removeTask(task.id);
    });

    card.addEventListener("dragstart", function () {
        draggedTaskId = task.id;
        card.classList.add("dragging");
    });

    card.addEventListener("dragend", function () {
        draggedTaskId = null;
        card.classList.remove("dragging");
    });

    return card;
}

function formatDate(date) {
    if (!date) {
        return "";
    }

    return new Date(date + "T00:00:00").toLocaleDateString(undefined, {
        day: "numeric",
        month: "short",
        year: "numeric"
    });
}

function updateTaskCounts() {
    document.querySelectorAll(".board-column").forEach(function (column) {
        const status = column.dataset.status;
        const numberOfTasks = tasks.filter(function (task) {
            return task.status === status;
        }).length;

        column.querySelector(".task-count").textContent = numberOfTasks;
    });
}

Object.entries(taskLists).forEach(function ([status, taskList]) {
    taskList.addEventListener("dragover", function (event) {
        event.preventDefault();
        taskList.classList.add("drag-over");
    });

    taskList.addEventListener("dragleave", function () {
        taskList.classList.remove("drag-over");
    });

    taskList.addEventListener("drop", function (event) {
        event.preventDefault();
        taskList.classList.remove("drag-over");

        const task = getTask(draggedTaskId);

        if (task) {
            task.status = status;
            task.completed = status === "completed";
            renderTasks();
        }
    });
});
