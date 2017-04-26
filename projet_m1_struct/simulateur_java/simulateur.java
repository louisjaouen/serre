import java.io.*;
import java.util.Random;


class simulateur extends Thread{
	public static void lecture_fichier() throws IOException {
			//Création de l'objet File
		File f = new File("donnees2.txt");
		System.out.println("Chemin absolu du fichier : " + f.getAbsolutePath());
		System.out.println("Nom du fichier : " + f.getName());
		System.out.println("Est-ce qu'il existe ? " + f.exists());
		System.out.println("Est-ce un répertoire ? " + f.isDirectory());
		System.out.println("Est-ce un fichier ? " + f.isFile());
		
		File file1 = new File("donnees2.txt");
	    File file2 = new File("e.txt");
	   
	    BufferedReader lecteurAvecBuffer = null;
		BufferedWriter writerAvecBuffer = null;	    
		String ligne="";
		int compteur=0;
		String test="null";
		while ( ligne != test ){
			try{
				Thread.sleep(3000);
			}catch(InterruptedException ie){

			}
			try
			{
				lecteurAvecBuffer = new BufferedReader(new FileReader(file1));
				writerAvecBuffer = new BufferedWriter(new FileWriter(file2));
			}
			catch(FileNotFoundException exc)
			{
				System.out.println("Erreur d'ouverture");
			}
			for(int i=0; i<compteur;i++){
				ligne = lecteurAvecBuffer.readLine();
				ligne +="\n" + lecteurAvecBuffer.readLine();
				ligne="";
			}
			String humi = lecteurAvecBuffer.readLine();
			String teau = lecteurAvecBuffer.readLine();

			Random r = new Random();
			ligne += String.valueOf(35 + r.nextInt(100 - 35));
			ligne +="\n" + String.valueOf(5 + r.nextInt(11 - 5));
			ligne +="\n" + String.valueOf(500 + r.nextInt(1000 - 500));
			ligne +="\n" + teau ;//
			ligne +="\n" + String.valueOf(16 + r.nextInt(18 - 16));
			ligne +="\n" + humi ;//
			ligne +="\n" + String.valueOf(5 + r.nextInt(10 - 5));
			compteur++;
			writerAvecBuffer.write(ligne);
			System.out.println(ligne);
			lecteurAvecBuffer.close();
			writerAvecBuffer.close();
		}

		
    	

	  
	    
	}

	public static void main(String args[]) throws IOException{
		System.out.println("Hello World");
		
		lecture_fichier();
	}
}

