package Java.testQuestion.looping;

public class For_Application3 {
    public void hallow () {
        for(int i = 2; i <= 9; i++) {

            for (int j = 1; j <= 4; j++) {
                int multiply = (i * j);

                if (multiply % 2 != 0) {
                    System.out.println(i + "*" + j + " = " + multiply);
                } else {
                    continue;
                }
            }
        }
    }
}
