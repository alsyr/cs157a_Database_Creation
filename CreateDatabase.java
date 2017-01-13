package cs157aDatabase;

import java.sql.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.LinkedList;
import java.util.List;
import java.util.regex.*;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.PrintWriter;

public class CreateDatabase {

	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileCompanyName = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/CompanyName")));
	//		BufferedReader brN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/companyN.txt"));
	//		BufferedReader brL = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/companyL.txt"));
	//
	//		String companyName;
	//		String companyLocation;
	//		int count = 1;
	//
	//		while ((companyName = brN.readLine()) != null && (companyLocation = brL.readLine()) != null) {
	//			String companyName2 = companyName.replaceAll("'","");
	//			String companyLocation2 = companyLocation.replaceAll("'","");
	//			String value;
	//			value = "('" +companyName2+ "', '" +companyLocation2+ "', " +count+ "),";
	//			count++;
	//			fileCompanyName.println(value);
	//		}
	//
	//		brN.close();
	//		brL.close();
	//		fileCompanyName.close();
	//	}

	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileCompanyMembers = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/CompanyMembers")));
	//		BufferedReader brN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/companyN.txt"));
	//		BufferedReader brFN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/firstName5495.txt"));
	//		BufferedReader brLN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/lastName88800.txt"));
	//		BufferedReader brCP = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/positionCompany30.txt"));
	//
	//		List<String> firstNames = new ArrayList<String>();
	//		List<String> lastNames = new ArrayList<String>();
	//		List<String> companyPositions = new ArrayList<String>();
	//
	//		String firstName;
	//		String lastName;
	//		String companyPosition;
	//		int min = 0;
	//		int minR = 1;
	//		int maxR = 10;
	//		int maxF = 5495;
	//		int maxL = 88800;
	//		int maxP = 30;
	//		int minA = 20;
	//		int maxA = 120;
	//
	//		while ((firstName = brFN.readLine()) != null) {
	//			firstNames.add(firstName);
	//		}
	//
	//		while ((lastName = brLN.readLine()) != null) {
	//			lastNames.add(lastName);
	//		}
	//
	//		while ((companyPosition = brCP.readLine()) != null) {
	//			companyPositions.add(companyPosition);
	//		}
	//
	//		String companyName;
	//
	//		while ((companyName = brN.readLine()) != null) {
	//			String companyName2 = companyName.replaceAll("'","");
	//			int randomRange = minR + (int)(Math.random() * ((maxR - minR) + 1));
	//
	//			for(int i=0; i<randomRange; i++){
	//				String companyLastName = lastNames.get(min + (int)(Math.random() * ((maxL - min))));
	//				String companyFirstName = firstNames.get(min + (int)(Math.random() * ((maxF - min))));
	//				int age = (minA + (int)(Math.random() * ((maxA - minA))));
	//				String position = companyPositions.get(min + (int)(Math.random() * ((maxP - min))));;
	//
	//				String value;
	//				value = "('" +companyName2+ "', '" +companyLastName+ "', '" +companyFirstName+ "', " +age+ ", '" +position+ "'),";
	//				fileCompanyMembers.println(value);
	//			}
	//
	//		}
	//
	//		brN.close();
	//		brFN.close();
	//		brLN.close();
	//		brCP.close();
	//		fileCompanyMembers.close();
	//	}


	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileFacilities = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Facilities")));
	//		BufferedReader brFa = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/hotelFacilities29.txt"));
	//
	//		String facility;
	//
	//		int min = 0;
	//		int minR = 100;
	//		int maxR = 2000;
	//		int maxF = 5495;
	//		int maxL = 88800;
	//		int maxP = 30;
	//		int minA = 20;
	//		int maxA = 120;
	//
	//		int count = 1;
	//		while ((facility = brFa.readLine()) != null) {
	//			int randomRange = minR + (int)(Math.random() * ((maxR - minR) + 1));
	//			
	//			String value;
	//			value = "(" +count+ ", " +randomRange+ ", '" +facility+ "'),";
	//			fileFacilities.println(value);
	//			count++;
	//		}
	//
	//		brFa.close();
	//		fileFacilities.close();
	//	}


	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileFacilitiesUsed = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/FacilitiesUsed")));
	//
	//		int min = 0;
	//		int minR = 1;
	//		int maxR = 29;
	//		int maxF = 5000;
	//
	//		for (int count = 1; count<=maxF; count++){
	//			int randomRange = minR + (int)(Math.random() * ((maxR - minR) + 1));
	//			
	//			String value;
	//			value = "(" +randomRange+ ", " +count+ "),";
	//			fileFacilitiesUsed.println(value);
	//		}
	//
	//		fileFacilitiesUsed.close();
	//	}


	public static void main(String[] args) throws IOException 
	{
		//creating new files were values will be written
		PrintWriter fileFamily = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Family")));
		PrintWriter fileFamilyMembers = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/FamilyMembers")));
		//opening files were data is stored
		BufferedReader brFN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/firstName5495.txt"));
		BufferedReader brLN = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/lastName88800.txt"));
		BufferedReader brC = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/cities59405.txt"));

		//declaring new lists to temporarily store data
		List<String> firstNames = new ArrayList<String>();
		List<String> lastNames = new ArrayList<String>();
		List<String> cities = new ArrayList<String>();

		String firstName;
		String lastName;
		String city;

		int min = 0;
		int minR = 1;
		int maxR = 5;
		int maxF = 5495;
		int maxL = 88800;
		int maxC = 59405;
		int minA = 1;
		int maxA = 120;
		int minPN = 111111111;
		int maxPN = 999999999;

		//storing data into lists
		while ((firstName = brFN.readLine()) != null) {
			firstNames.add(firstName);
		}

		while ((lastName = brLN.readLine()) != null) {
			lastNames.add(lastName);
		}

		while ((city = brC.readLine()) != null) {
			cities.add(city);
		}

		int count = 2001;

		//creating random new values
		for(int i=1; i<=3000; i++){
			String familyLastName = lastNames.get(min + (int)(Math.random() * ((maxL - min))));
			int randomRange = minR + (int)(Math.random() * ((maxR - minR) + 1));
			String theCity = cities.get(min + (int)(Math.random() * ((maxC - min))));
			int thePhone = (minPN + (int)(Math.random() * ((maxPN - minPN))));
			for(int j=0; j<randomRange; j++){
				String familyFirstName = firstNames.get(min + (int)(Math.random() * ((maxF - min))));
				int age = (minA + (int)(Math.random() * ((maxA - minA))));

				String value1;
				value1 = "('" +familyLastName+ "', '" +familyFirstName+ "', " +age+ ", " +i+ "),";
				fileFamilyMembers.println(value1);

			}

			String value2;
			value2 = "(" +i+ ", '" +familyLastName+ "', '" +theCity+ "', " +thePhone+ ", " +count+ "),";
			fileFamily.println(value2);
			count++;

		}

		brFN.close();
		brLN.close();
		brC.close();
		fileFamily.close();
		fileFamilyMembers.close();
	}


	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileFood = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Food")));
	//		BufferedReader brFa = new BufferedReader(new FileReader("/Users/AlSyR/Downloads/food180.txt"));
	//
	//		String food;
	//
	//		int minP = 10;
	//		int maxP = 99;
	//
	//		int count = 1;
	//		while ((food = brFa.readLine()) != null) {
	//			int randomPrice = minP + (int)(Math.random() * ((maxP - minP) + 1));
	//
	//			String value;
	//			value = "(" +count+ ", " +randomPrice+ ", '" +food+ "'),";
	//			fileFood.println(value);
	//			count++;
	//		}
	//
	//		brFa.close();
	//		fileFood.close();
	//	}


	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter fileId = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/GuestID")));
	//
	//		for(int i=1; i<=5000; i++) {
	//
	//			String value;
	//			value = "(" +i+ "),";
	//			fileId.println(value);
	//		}
	//
	//		fileId.close();
	//	}

		// public static void main(String[] args) throws IOException 
		// {
		// 	PrintWriter fileOrder = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Orders")));
	

		// 	String food;
	
		// 	int minR = 1;
		// 	int maxR = 10;

		// 	int minFood = 1;
		// 	int maxFood = 180;

		// 	int minDay = 10;
		// 	int maxDay = 30;

		// 	int minHour = 1;
		// 	int maxHour = 9;

		// 	int minMS = 10;
		// 	int maxMS = 59;
	
		// 	int count = 1;
		// 	for(int i=1; i<=5000; i++){
		// 		int randomRange = minR + (int)(Math.random() * ((maxR - minR) + 1));
	
		// 		for(int j=0; j<randomRange; j++){
		// 			int randomFood = minFood + (int)(Math.random() * ((maxFood - minFood) + 1));
		// 			int randomquantity = minR + (int)(Math.random() * ((maxR - minR) + 1));
		// 			int randomDay = minDay + (int)(Math.random() * ((maxDay - minDay) + 1));
		// 			int randomHour = minHour + (int)(Math.random() * ((maxHour - minHour) + 1));
		// 			int randomMin = minMS + (int)(Math.random() * ((maxMS - minMS) + 1));
		// 			int randomSec = minMS + (int)(Math.random() * ((maxMS - minMS) + 1));
	
		// 			String value;
		// 			value = "(" +count+ ", " +i+ ", " +randomFood+ ", '2015-11-" +randomDay+ "', '0" +randomHour+ ":" +randomMin+ ":" +randomSec+ "', " +randomquantity+ "),";
		// 			fileOrder.println(value);
		// 			count++;
		// 		}		

		// 	}
	
		// 	fileOrder.close();
		// }


	//	public static void main(String[] args) throws IOException 
	//	{
	//		PrintWriter filePayment = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Payments")));
	//
	//		List<String> methodPayment = new ArrayList<String>();
	//		methodPayment.add("Check");
	//		methodPayment.add("Cash");
	//		methodPayment.add("Credit Card");
	//
	//		int minR = 1;
	//		int maxR = 10;
	//
	//		int minAmount = 10000;
	//		int maxAmount = 999999;
	//
	//		int minDay = 10;
	//		int maxDay = 30;
	//
	//		int minMethod = 0;
	//		int maxMethod = 2;
	//
	//		for(int i=1; i<=5000; i++){
	//			int randomAmount = minAmount + (int)(Math.random() * ((maxAmount - minAmount) + 1));
	//			int randomDay = minDay + (int)(Math.random() * ((maxDay - minDay) + 1));
	//			int randomMethod = minMethod + (int)(Math.random() * ((maxMethod - minMethod) + 1));
	//
	//			String value;
	//			value = "(" +i+ ", " +randomAmount+ ", '2016-01-" +randomDay+ "', '" +methodPayment.get(randomMethod)+ "', " +i+ "),";
	//			filePayment.println(value);
	//		}		
	//
	//		filePayment.close();
	//	}


//	public static void main(String[] args) throws IOException 
//	{
//		PrintWriter fileRoom = new PrintWriter((new FileWriter("/Users/AlSyR/Downloads/Room")));
//
//		List<String> typeRooms = new ArrayList<String>();
//		typeRooms.add("Single Room");
//		typeRooms.add("Double Room");
//		typeRooms.add("Junior Suite");
//		typeRooms.add("Superior Suite");
//		typeRooms.add("Executive Suite");
//		typeRooms.add("Family Suite");
//		typeRooms.add("Grande Suite");
//		typeRooms.add("Premier Double Room");
//		typeRooms.add("Premier Junior Suite");
//		typeRooms.add("Honeymoon Suite");
//		typeRooms.add("Premier Executive Suite");
//		typeRooms.add("Premier Prestige Suite");
//		typeRooms.add("Penthouse Suite");
//		typeRooms.add("Presidential Suite");
//
//		List<Integer> roomIds = new LinkedList<Integer>();
//		
//		for(int k=1; k<=5000; k++){
//			roomIds.add(k);
//		}
//		
//		int minAmount = 1000;
//		int maxAmount = 30000;
//
//		int minDay = 10;
//		int maxDay = 31;
//
//		int minRoom = 0;
//		int maxRoom = 13;
//
//		int maxRandomId = 5000;
////		(`room_number`, `type`, `rate`, `guest_id`, `check_in_date`, `check_out_date`)
////		(12, 'luxe', 1234, 2, '2015-11-02', '2015-11-26'),
//		
//		for(int i=1; i<=5000; i++){
//			int randomAmount = minAmount + (int)(Math.random() * ((maxAmount - minAmount) + 1));
//			int randomStartDay = minDay + (int)(Math.random() * ((maxDay - minDay) + 1));
//			int randomEndDay = minDay + (int)(Math.random() * ((maxDay - minDay) + 1));
//			int randomRoom = minRoom + (int)(Math.random() * ((maxRoom - minRoom) + 1));
//			int randomIndex = minRoom + (int)(Math.random() * ((maxRandomId - minRoom)));
//			int roomId = roomIds.get(randomIndex);
//			roomIds.remove(randomIndex);
//			
//			String value;
//			value = "(" +i+ ", '" +typeRooms.get(randomRoom)+ "', " +randomAmount+ ", " +roomId+ ", '2015-10-" +randomStartDay+ "', '2015-12-" +randomEndDay+ "'),";
//			fileRoom.println(value);
//			maxRandomId--;
//		}		
//
//		fileRoom.close();
//	}
}
