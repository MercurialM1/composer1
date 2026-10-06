import './bootstrap';

/**
 * Это кроппер
 * пользователь загружает картинку
 * картинка появляется в кроппере
 * при обрезке файл заменяет исходник
 * и отправляет его с формы на сервер при сохранении
 */
import Cropper from "cropperjs";
let cropper
document.addEventListener('DOMContentLoaded', () => {
    const imageInput = document.getElementById('imageInput')
    const croppedImage = document.getElementById('croppedImage')
    const cropButton = document.getElementById('crop-button')
    //обработка выбора файла
    imageInput.addEventListener('change', (e) => {
        //первый файл записывается в переменную
        const file = e.target.files[0]
        //защитная проверка от пустого выбора
        if (file) {
            //прочитать файл
            const reader = new FileReader()
            //выполняется если файл прочитан успешно
            reader.onload = (e) => {
                //назначение src для картинки
                croppedImage.src = e.target.result
                croppedImage.classList.remove('hidden')
                //убирать прошлую фотку если она есть
                if (cropper) cropper.destroy();
                //создание самого кроппера
                cropper = new Cropper(croppedImage);

                // свойства
                const canvas = cropper.getCropperCanvas();
                const selection = cropper.getCropperSelection();

                //фон
                if (canvas) {
                    canvas.background = false;
                    canvas.style.position = 'relative';
                }
                // рамка
                if (selection) {
                    selection.aspectRatio = 1;
                    // что бы не выходить за границы
                    selection.bounds = 'parent';
                }
                //меняет display none на inline block
                cropButton.style.display = 'inline-block'
            }
            reader.readAsDataURL(file)
        }
    });
    //кнопка обрезать
    cropButton.addEventListener('click', () => {
        if (cropper) {
            //создаёт обрезанную фотку
        cropper.getCropperSelection().$toCanvas()
                .then((canvas) => {
                    //Конвертация объекта в файл
                    canvas.toBlob((blob) => {
                        const file = new File([blob], 'product.jpg', {type: 'image/jpeg'});
                        //создаём объект dataTransfer и добавляем туда наш сверху созданный
                        const dt = new DataTransfer();
                        dt.items.add(file);
                        //присваиваем к отправке формы
                        imageInput.files = dt.files;
                        //показать саму обрезанную фотку
                        const resultImage = document.getElementById('resultImage');
                        if (resultImage) {
                            resultImage.src = URL.createObjectURL(blob);
                            resultImage.classList.remove('hidden');
                        }
                        //параметры в toBlob тип и качество, где 1 это 100%
                    }, 'image/jpeg', 1);
                })
                //поймать ошибочки
                .catch((error) => {
                    console.error("Ошибка:", error);
                });
        }
    });
})

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
