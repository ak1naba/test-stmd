// Вешаем событие на сам документ, когда загрузится контент, затем цепляем функцию
document.addEventListener("DOMContentLoaded", function() {
    // Ищем таблицу по id, в данном случае таблица имеет id = tournament-table
    const table = document.getElementById("tournament-table");
    // Ищем заголовки по которым
    const headers = table.querySelectorAll(".sorting");

    // Перебираем заголовки сортировки
    headers.forEach(function(header) {
        //Вешаем на них обработчик события по клику
        header.addEventListener("click", function() {
            // Получаем индекс колонки, в которой находится заголовко
            const column = header.cellIndex;
            // Создаем массив с помощью Array.from, пололнительно указываем какие строки брать.
            // У нас есть thead, в котором находятся элементы "служебные", а информация в tbody
            const rows = Array.from(table.querySelectorAll("tbody tr"));

            // Применяем к полученному массиву метод sort, в который передаем функцию
            rows.sort(function(a, b) {
                // Присваиваем значению из ячейки по индексу, получаем текст, также обрезаем пробелы в начале и конце
                const aValue = a.cells[column].textContent.trim();
                // Присваиваем значению из ячейки по индексу, получаем текст, также обрезаем пробелы в начале и конце
                const bValue = b.cells[column].textContent.trim();
                // Функция возвращает результат по которому поставит элемент в начало или в конце
                // Так как нужен обратный порядок, сравниваем со вторым значением,
                // передаем первое значение, язык пропускам, сравниваем в формате числа, чувствительность к регистру пропускам
                return bValue.localeCompare(aValue, undefined, { numeric: true, sensitivity: 'base' });
            });

            // перебираем заголовки с помощью цикла
            headers.forEach(function(header) {
                // У объекта удаляем из списка классов класс, отвечающий за выделение
                header.classList.remove("sorted");
            });

            // Добавляем флаг к текущему заголовку
            header.classList.add("sorted");

            // Перебираем уже отсортированный массив
            rows.forEach(function(row) {
                // В таблице ищем селектор tbody, затем добавляем в него строку
                table.querySelector("tbody").appendChild(row);
            });
        });
    });
});